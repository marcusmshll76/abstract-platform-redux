<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Closure;

class IdentifySite {
    public function handle($request, Closure $next) {
        $hostname = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
        $subdomain = explode('.', $hostname, 2)[0];

        $maybe_site = \DB::table('sites')->where('host', $subdomain)->first();
        // If we don't find a site, redirect to the first site.
        if (!$maybe_site && $subdomain === 'abstract') {
            $primary = DB::table('sites')->where('id', 1)->first();
            return redirect('http://' . $primary->host);
        }
        
        $request->site = $maybe_site;
        View::share('site', $maybe_site);
        return $next($request);
    }
}