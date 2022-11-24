<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\main\Setting;
use Illuminate\Support\Facades\View;

class Settings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $data['setting'] = Setting::all();

        foreach($data['setting'] as $keys){
            $setting[$keys->key] = $keys->value;
        }

        View::Share($setting);

        return $next($request);
    }
}
