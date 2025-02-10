<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class SetAdminPaginationTheme
{
    public function handle($request, Closure $next)
    {
        Config::set('livewire.pagination_theme', Config::get('livewire.admin_pagination_theme'));
        return $next($request);
    }
}
