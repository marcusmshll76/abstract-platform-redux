<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Closure;

class IdentifySite {
    public function handle($request, Closure $next) {
        $hostname = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];

        $maybe_site = \DB::table('sites')->where('host', $hostname)->first();
        // If we don't find a site, redirect to the first site.
        if (!$maybe_site) {
            $primary = DB::table('sites')->where('id', 1)->first();
            $a = explode('.', $hostname, 2)[0];
            if ($a !== 'develop' &&  $a !== 'demo') {
                return redirect('http://' . $primary->host);
            } 
            else{
                $maybe_site = $primary;
                $maybe_site->host = explode('.', $maybe_site->host, 2)[0];
            }
        } else {
            $maybe_site->host = explode('.', $hostname, 2)[0];
        }
        
        $request->site = $maybe_site;
        View::share('site', $maybe_site);
        return $next($request);
    }
}