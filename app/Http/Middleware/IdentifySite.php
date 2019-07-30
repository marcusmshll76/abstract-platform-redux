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
        $a = explode('.', $hostname, 3);
        if (!$maybe_site) {
            $primary = DB::table('sites')->where('id', 1)->first();
            if ($a[0] !== 'develop') {
                return redirect('http://' . $primary->host);
            } 
            else{
                $maybe_site = $primary;
                $maybe_site->host = 'abstract';
            }
        } else {
            if ($a[0] !== 'develop') {
                $maybe_site->host = $a[0];
            } else {
                $maybe_site->host = 'abstract';
            }
        }
        
        $request->site = $maybe_site;
        View::share('site', $maybe_site);
        return $next($request);
    }
}