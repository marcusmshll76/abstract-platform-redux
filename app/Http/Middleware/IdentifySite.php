<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Closure;

class IdentifySite {
    public function handle($request, Closure $next) {
        $hostname = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];

        $maybe_site = \DB::table('sites')->where('host', $hostname)->first();
        $a = explode('.', $hostname, 3);
        // If we don't find a site.
        if (!$maybe_site) {
            $primary = DB::table('sites')->where('id', 1)->first();
            // check if development server
            $maybe_site = $primary;
            if ($a[0] == 'develop') {
                // Enable sponsor view
                $maybe_site->host = 'abstract';
            } elseif ($a[0] != 'demo' && $a[0] != 'develop') {
                // redirect to the first site
                return redirect('http://' . $primary->host);
            }
        } else {
            // check if development server
            if ($a[0] == 'develop') {
                // Enable sponsor view
                $maybe_site->host = 'abstract';
            } else {
                // Set dynamic site host
                $maybe_site->host = explode('.', $hostname, 2)[0];
            }
        }
        
        $request->site = $maybe_site;
        View::share('site', $maybe_site);
        return $next($request);
    }
}