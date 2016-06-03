<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CheckForAdminRole {

    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next) {
        if ($this->auth->guest() || !$request->user()->hasRole(explode('|', 'admin'))) {
            return redirect(route('web.admin.home.index'));
        }

        return $next($request);
    }

}
