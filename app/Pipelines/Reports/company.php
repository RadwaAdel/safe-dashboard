<?php


namespace App\Pipelines\Reports;

use Closure;

class company
{
    public function handle($request, Closure $next)
    {
        if (request()->input('company_id') == "") {
            return $next($request);
        }
        return $next($request)->where('company_id',request()->input('company_id'));

    }
}
