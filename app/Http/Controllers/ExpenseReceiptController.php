<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Revenues;
use App\Models\Transaction;
use validator;

class ExpenseReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions  = Transaction::where('transaction',1)->get();
        return view('exp-receipts.index',compact('transactions'));

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
        $expenses =Expense::get();
        $revenueType='';
        $transactionValue = 1;
            return view('exp-receipts.create', compact('companies','revenueType','transactionValue' , 'expenses', 'banks'));

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
            'transaction' => 1,
            'bank_id' => $request->bank_id,
            'expense_id'=>$request->expense_id,
        ]);
        $transaction->save();
            return redirect(route('exreceipt.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findorfail($id);
        $banks = Bank::get();
        $companies = Company::get();
        $expenses =Expense::get();
            return view('exp-receipts.edit',
                compact('transaction', 'banks', 'expenses', 'companies',));
        }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
            'check_num' => $request->check_num,
            'due_date' => $request->due_date,
            'bank_id' => $request->bank_id,
            'expense_id'=>$request->expense_id,

        ]);
         return redirect()->route('exreceipt.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::where('id' ,$id)->delete();
            return redirect()->route('exreceipt.index');
        }

}
