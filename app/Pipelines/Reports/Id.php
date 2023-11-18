<?php


namespace App\Pipelines\Reports;

use Closure;

class Id
{
    public function handle($request, Closure $next)
    {
        if (request()->input('id') == "") {
            return $next($request);
        }
        return $next($request)->where('id',request()->input('id'));

    }
}
