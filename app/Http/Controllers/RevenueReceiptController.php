<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Company;
use App\Models\Expense;
use App\Models\RevenueReceipt;
use App\Models\Revenues;
use App\Models\Transaction;
use Illuminate\Http\Request;
use validator;

class RevenueReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('transaction',2)->get();
        return view('receipt.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::get();
        $companies = Company::get();
        $revenues =Revenues::get();
        $revenueType='';
        $transactionValue = 2;
        return view('receipt.create', compact('companies','revenueType','transactionValue' , 'revenues', 'banks'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'receipt_date' => 'required',
            'company_id' => 'required',
            'pay'=>'required|numeric',
            'value' => 'nullable|numeric',
            'check_num' => 'nullable|integer',
            'due_date' => 'nullable',
            'bank_id' => 'nullable|integer',
            'revenue_id' => 'nullable',
            'expense_id' => 'nullable',

        ]);
        $transaction=Transaction::create([
            'receipt_date' => $request->receipt_date,
            'company_id' => $request->company_id,
            'revenue_type' => $request->revenue_type,
            'pay'=>$request->pay,
            'value' => $request->value,
            'check_num' => $request->check_num,
            'due_date' => $request->due_date,
            'transaction' => 2,
            'bank_id' => $request->bank_id,
            'revenue_id'=>$request->revenue_id,
        ]);
        $transaction->save($request->all());
        return redirect(route('receipt.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RevenueReceipt  $revenueReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(RevenueReceipt $revenueReceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RevenueReceipt  $revenueReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $transaction = Transaction::findorfail($id);
        $banks = Bank::get();
        $companies = Company::get();
        $revenues =Expense::get();
        return view('receipt.edit',
            compact('transaction', 'banks', 'revenues', 'companies',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RevenueReceipt  $revenueReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'receipt_date' => 'required',
            'company_id' => 'required',
            'revenue_type' => 'required',
            'pay'=>'required|numeric',
            'value' => 'nullable|numeric',
            'check_num' => 'nullable|integer',
            'due_date' => 'nullable',
            'bank_id' => 'nullable|integer',
            'revenue_id' => 'nullable',
            'expense_id' => 'nullable',
        ]);
        $transaction= Transaction::findOrFail($id);
        $transaction->update([
            'receipt_date' => $request->receipt_date,
            'company_id' => $request->company_id,
            'revenue_type' => $request->revenue_type,
            'pay'=>$request->pay,
            'value' => $request->value,
            'revenue_id' => $request->revenue_id,
            'check_num' => $request->check_num,
            'due_date' => $request->due_date,
            'bank_id' => $request->bank_id,
            'revenue_id'=>$request->revenue_id

        ]);
        return redirect()->route('receipt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RevenueReceipt  $revenueReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::where('id' ,$id)->delete();
        return redirect()->route('receipt.index');
    }
}
