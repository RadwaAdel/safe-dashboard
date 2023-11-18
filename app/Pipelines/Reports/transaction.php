<?php


namespace App\Pipelines\Reports;

use Closure;

class transaction
{
    public function handle($request, Closure $next)
    {
        if (request()->input('transaction') == "") {
            return $next($request);
        }
        return $next($request)->where('transaction',request()->input('transaction'));

    }
}
