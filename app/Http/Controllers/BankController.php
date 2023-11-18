<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
//        $query = Bank::query();
//        if(!auth()->user()->is_admin){
//            $query->where('user_id', auth()->user()->id);
//        }
//        $banks =$query->paginate(10);
        $banks = Bank::all();
        return view('banks.index',compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'bank' =>'required',
           'branch' =>'required',
           'account_num'=>'required|max:14'
        ]);
      $bank=  Bank::create([
            'bank'=>$request->bank,
            'branch'=>$request->branch,
             'account_num'=>$request->account_num,
            'user_id'=> $request->user()->id
        ]);
        $bank->save();
        return redirect()->route('bank.index')->with('success','تم الحفظ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $this->authorize('edit', $id);
        $bank = Bank::findorfail($id);

        return view('banks.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request)
    {
        $request->validate([
            'bank' =>'required',
            'branch' =>'required',
            'account_num'=>'required'
        ]);

        $bank  = Bank::findorfail($id);
//        dd($bank,$request->all());
        $bank->update($request->all());

        return redirect()->route('bank.index')->with('success','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Bank::where('id' ,$id)->delete();
        return redirect()->route('bank.index')->with('success','تم الحذف');
    }

    public function DataTableAjax(){
        $query = Bank::query();

        return DataTables::of($query)
            ->addColumn('action', function($row){
                return view('Dashboard.pages.Driver.Btn.Action',compact('row'))->render();
            })
            ->toJson();
    }
}
