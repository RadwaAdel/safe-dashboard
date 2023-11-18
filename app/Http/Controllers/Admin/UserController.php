<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index(Request $request){
//        $search = $request['search'] ?? "";
//        if ($search != ""){
//            $users = User::where(function ($query)use($search){
//                $query->where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")
//                    ->orWhere('id','LIKE',"%$search%");
//            })->paginate(5);
//
//        }else{
//            $users = User::where('id',"!=",auth()->user()->id)->paginate(5);
//        }
        $users = User::all()->where('id',"!=",auth()->user()->id);

        return view('users.index',compact('users'));
    }

    public function destroy(  $id,Request $request)
    {
        User::where('id', $id)->delete();
        return redirect()->route('all.users')->with('success','تم الحذف ');

    }
public function edit($id){
    $user = User::findorfail($id);
    return view('users.edit',compact('user'));
}
public  function update($id,Request $request){
$request->validate([
    'name'=>'required',
    'email'=>'required|email',
    'password'=>'required'
    ]);
    $user = User::findorfail($id);
    $user->name =$request->input('name')  ;
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save($request->all());
    return redirect()->route('all.users')->with('success','تم التعديل ');

}
//public function search(Request $request){
//      if (isset($_GET['search'])){
//          $search_text=$_GET['search'];
//          $users =DB::table('user')->where('name','like',"%$search_text%")
//              ->orWhere('email','like',"%$search_text%")
//              ->orWhere('id','like',"%$search_text%");
//          dd($search_text);
//
//          $users->appends($request->all());
//          return view('search',['users'=>$users]);
//      }
//    return view('users.index');
//

//}


}
