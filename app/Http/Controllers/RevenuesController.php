<?php

namespace App\Http\Controllers;

use App\Models\Revenues;
use Illuminate\Http\Request;

class RevenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $query = Revenues::query();
//        if(!auth()->user()->is_admin){
//            $query->where('user_id', auth()->user()->id);
//        }
//        $revenues = $query-> paginate(10);
        $revenues =Revenues::all();
        return view('revenues.index',compact('revenues'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revenues.create');

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
            'revenue_name' => 'required',
        ]);
        $revenue= Revenues::create([
            'revenue_name'=>$request->revenue_name,
            'user_id'=> $request->user()->id
        ]);
        $revenue->save();

        return redirect()->route('revenues.index')->with('success','تم الحفظ');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function show(Revenues $revenues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revenues = Revenues::findorfail($id);
        return view('revenues.edit',compact('revenues'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'revenue_name' => 'required',
        ]);
        $revenues  = Revenues::findorfail($id);

        $revenues->update($request->all());

        return redirect()->route('revenues.index')
            ->with('success','تم التعديل');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function destroy(  $id,Request $request)
    {
        Revenues::where('id', $id)->delete();
        return redirect()->route('revenues.index')->with('success','تم الحذف ');
    }
}
