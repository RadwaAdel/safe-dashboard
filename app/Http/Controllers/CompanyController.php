<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $query =Company::query();
//        if(!auth()->user()->is_admin){
//            $query->where('user_id', auth()->user()->id);
//        }
//            $companies = $query->paginate(10);

       $companies=Company::all();
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');

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
            'company' => 'required',
            'employee' => 'required',

        ]);

         $company=Company::create([
            'company'=>$request->company,
            'employee'=>$request->employee,
            'user_id'=> $request->user()->id

        ]);

        $company->save();
        return redirect()->route('company.index')->with('success','تم الحفظ');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findorfail($id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'company' => 'required',
            'employee' => 'required',
            ]);
        $company  = Company::findorfail($id);
        $company->update($request->all());

        return redirect()->route('company.index')
            ->with('success','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id,Request $request)
    {
        Company::where('id', $id)->delete();
        return redirect()->route('company.index')->with('success','تم الحذف ');
    }
}
