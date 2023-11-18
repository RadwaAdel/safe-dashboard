<?php


namespace App\Pipelines\Reports;

use Closure;
class DateTo
{
    public function handle($request, Closure $next)
    {
        if ( request()->input('end_date') == "") {
            return $next($request);
        }
        return $next($request)->where(function ($query) {
            $query->whereDate('receipt_date', '<=', request()->end_date );
        });
    }
}
