<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Firebase\JWT\JWT;
use GuzzleHttp\Client;

class BoxController extends Controller
{
    public function generateAccessToken() {
        $config_path = storage_path('app/box/config.json');
        $json = file_get_contents($config_path);
        $config = json_decode($json);

        $private_key = $config->boxAppSettings->appAuth->privateKey;
        $passphrase = $config->boxAppSettings->appAuth->passphrase;
        $key = openssl_pkey_get_private($private_key, $passphrase);

        $authenticationUrl = 'https://api.box.com/oauth2/token';

        $claims = [
          'iss' => $config->boxAppSettings->clientID,
          'sub' => $config->enterpriseID,
          'box_sub_type' => 'enterprise',
          'aud' => $authenticationUrl,
          // This is an identifier that helps protect against
          // replay attacks
          'jti' => base64_encode(random_bytes(64)),
          // We give the assertion a lifetime of 45 seconds 
          // before it expires
          'exp' => time() + 45,
          'kid' => $config->boxAppSettings->appAuth->publicKeyID
        ];

        // The API support "RS256", "RS384", and "RS512" encryption
        $assertion = JWT::encode($claims, $key, 'RS512');

        $params = [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $assertion,
            'client_id' => $config->boxAppSettings->clientID,
            'client_secret' => $config->boxAppSettings->clientSecret
          ];
          
          // Make the request
          $client = new Client();
          $response = $client->request('POST', $authenticationUrl, [
            'form_params' => $params
          ]);
          
          // Parse the JSON and extract the access token
          $data = $response->getBody()->getContents();
          $access_token = json_decode($data)->access_token;

          return response()->json([
            'response' => $access_token
        ]);
    }
}
