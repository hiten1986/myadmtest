<?php

namespace App\Http\Kopassus\Modules\AdminSeller\Middleware;

use Closure;

class InjectConfig
{
    protected $baseUrl;
    protected $appTitle;
    protected $appDescription;
    protected $appTheme;

    public function __construct()
    {   
        $conFile = 'modules_seller';
        
        $this->baseUrl = config($conFile . '.baseUrl');
        $this->appTitle = config($conFile . '.appTitle');
        $this->appDescription = config($conFile . '.appDescription');
        $this->appTheme = config($conFile . '.appTheme');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }
}
