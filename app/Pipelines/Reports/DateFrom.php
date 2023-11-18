<?php


namespace App\Pipelines\Reports;

use Closure;
class DateFrom
{
    public function handle($request, Closure $next)
    {
        if (request()->input('start_date') == "") {
            return $next($request);
        }
        return $next($request)->where(function ($query) {
            $query->whereDate('receipt_date', '>=', request()->start_date);
        });
    }
}
