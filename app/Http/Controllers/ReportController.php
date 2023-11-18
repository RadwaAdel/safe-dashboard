<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showBankReport()
    {
        if (\request()->ajax()) {
            return $this->DataTableAjax();
        }

        $dataTable = $this->DataTableAjax();
        $totalRevenue = $dataTable->totalRevenue;
        $totalExpense = $dataTable->totalExpense;
        $totalDifference =$dataTable->totalDifference;

        return view('Reports.reportsBank', compact('totalRevenue', 'totalExpense','totalDifference'));
    }
public function showTotalBank(){
    if (\request()->ajax()) {
        return $this->DataTableBankAllAjax();
    }
        return view('Reports.allReportsBank');
}
    public function showCashReport()
    {


        if (\request()->ajax()) {
            return $this->DataTableChashAjax();
        }

        $dataTable = $this->DataTableChashAjax();
        $totalRevenue = $dataTable->totalRevenue;
        $totalExpense = $dataTable->totalExpense;
        $totalDifference =$dataTable->totalDifference;
        return view('Reports.reportsCash',compact('totalExpense','totalRevenue','totalDifference'));
    }

    public function showTotalCash(){
        if (\request()->ajax()) {
            return $this->DataTableCashAllAjax();
        }
        return view('Reports.allReportsCash');
    }

    private  function DataTableAjax()
    {
        $query = app(Pipeline::class)
            ->send(
                Transaction::with(['revenues', 'expense'])
                    ->whereNotNull('bank_id')
            )
            ->through([
                \App\Pipelines\Reports\Id::class,
                \App\Pipelines\Reports\company::class,
                \App\Pipelines\Reports\DateFrom::class,
                \App\Pipelines\Reports\DateTo::class,
                \App\Pipelines\Reports\transaction::class,
            ])
            ->thenReturn();

        $dataTable = DataTables::of($query)
            ->addColumn('transaction', function ($transaction) {
                return view('Reports.transaction', compact('transaction'))->render();
            })
            ->addColumn('company', function ($transaction) {
                return $transaction->company->company;
            })
            ->addColumn('payType', function ($transaction) {
                return view('Reports.paymentType', compact('transaction'));
            })
            ->addColumn('totalPay', function ($transaction) {
                return $transaction->sum('pay');
            })->toJson();

        $totalRevenue =   app(Pipeline::class)
            ->send(
                Transaction::with(['revenues', 'expense'])
                    ->whereNotNull('bank_id')
            )
            ->through([
                \App\Pipelines\Reports\Id::class,
                \App\Pipelines\Reports\company::class,
                \App\Pipelines\Reports\DateFrom::class,
                \App\Pipelines\Reports\DateTo::class,
                \App\Pipelines\Reports\transaction::class,
            ])
            ->thenReturn()->where('transaction',2)->sum('pay');
        $totalExpense =  app(Pipeline::class)
            ->send(
                Transaction::with(['revenues', 'expense'])
                    ->whereNotNull('bank_id')
            )
            ->through([
                \App\Pipelines\Reports\Id::class,
                \App\Pipelines\Reports\company::class,
                \App\Pipelines\Reports\DateFrom::class,
                \App\Pipelines\Reports\DateTo::class,
                \App\Pipelines\Reports\transaction::class,
            ])
            ->thenReturn()->where('transaction',1)->sum('pay');

        $dataTable->totalRevenue = $totalRevenue;
        $dataTable->totalExpense = $totalExpense;
        $dataTable->totalDifference = $totalRevenue - $totalExpense;

        return $dataTable;
        }

    private  function DataTableChashAjax(){
        $query = app(Pipeline::class)
            ->send(
                Transaction::with(['revenues', 'expense'])
                    ->whereNull('bank_id')
            )
            ->through([
                \App\Pipelines\Reports\Id::class,
                \App\Pipelines\Reports\company::class,
                \App\Pipelines\Reports\DateFrom::class,
                \App\Pipelines\Reports\DateTo::class,
                \App\Pipelines\Reports\transaction::class,
            ])
            ->thenReturn();


        $dataTable = DataTables::of($query)
            ->addColumn('transaction', function ($transaction) {
                return view('Reports.transaction', compact('transaction'))->render();
            })
            ->addColumn('company', function ($transaction) {
                return $transaction->company->company;
            })
            ->addColumn('payType', function ($transaction) {
                return view('Reports.paymentType', compact('transaction'));
            })
            ->addColumn('totalPay', function ($transaction) {
                return $transaction->sum('pay');
            })->toJson();

        $totalRevenue =   app(Pipeline::class)
            ->send(
                Transaction::with(['revenues', 'expense'])
                    ->whereNull('bank_id')
            )
            ->through([
                \App\Pipelines\Reports\Id::class,
                \App\Pipelines\Reports\company::class,
                \App\Pipelines\Reports\DateFrom::class,
                \App\Pipelines\Reports\DateTo::class,
                \App\Pipelines\Reports\transaction::class,
            ])
            ->thenReturn()->where('transaction',2)->sum('pay');
        $totalExpense =  app(Pipeline::class)
            ->send(
                Transaction::with(['revenues', 'expense'])
                    ->whereNull('bank_id')
            )
            ->through([
                \App\Pipelines\Reports\Id::class,
                \App\Pipelines\Reports\company::class,
                \App\Pipelines\Reports\DateFrom::class,
                \App\Pipelines\Reports\DateTo::class,
                \App\Pipelines\Reports\transaction::class,
            ])
            ->thenReturn()->where('transaction',1)->sum('pay');

        $dataTable->totalRevenue = $totalRevenue;
        $dataTable->totalExpense = $totalExpense;
        $dataTable->totalDifference = $totalRevenue - $totalExpense;

        return $dataTable;

    }

    private  function DataTableBankAllAjax(){
        $query = app(Pipeline::class)
            ->send(Transaction::with(['revenues', 'expense'])->
            whereNotNull('bank_id')->selectRaw("receipt_date,SUM(CASE WHEN transaction = 2
             THEN pay ELSE 0 END) as totalRevenue,
                         SUM(CASE WHEN transaction = 1 THEN pay ELSE 0 END) as totalExpense")
                ->groupBy('receipt_date'))
            ->through([
//                \App\Pipelines\Reports\Id::class,
//                \App\Pipelines\Reports\company::class,
//                \App\Pipelines\Reports\DateFrom::class,
//                \App\Pipelines\Reports\DateTo::class,
//                \App\Pipelines\Reports\transaction::class,

            ])
            ->thenReturn();


        return DataTables::of($query)
            ->addColumn('transaction', function($transaction){
                return view('Reports.transaction',compact('transaction'))->render();
            })
            ->addColumn('payType', function($transaction){
                return view('Reports.paymentType',compact('transaction')) ;
            })
            ->addColumn('totalRevenue', function($transaction){
                return  $transaction->totalRevenue ;
            })
            ->addColumn('totalExpense', function($transaction){
                return  $transaction->totalExpense ;
            })
            ->toJson();


    }

    private  function DataTableCashAllAjax(){
        $query = app(Pipeline::class)
            ->send(Transaction::with(['revenues', 'expense'])->
            whereNull('bank_id')->selectRaw("receipt_date,SUM(CASE WHEN transaction = 2
             THEN pay ELSE 0 END) as totalRevenue,
                         SUM(CASE WHEN transaction = 1 THEN pay ELSE 0 END) as totalExpense")
                ->groupBy('receipt_date'))
            ->through([
//                \App\Pipelines\Reports\Id::class,
//                \App\Pipelines\Reports\company::class,
//                \App\Pipelines\Reports\DateFrom::class,
//                \App\Pipelines\Reports\DateTo::class,
//                \App\Pipelines\Reports\transaction::class,
             ])
            ->thenReturn();
        return DataTables::of($query)
            ->addColumn('transaction', function($transaction){
                return view('Reports.transaction',compact('transaction'))->render();
            })
            ->addColumn('totalRevenue', function($transaction){
                return $transaction->totalRevenue ;
            })
            ->addColumn('totalExpense', function($transaction){
                return  $transaction->totalExpense ;
            })
            ->toJson();


    }



}

