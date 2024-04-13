<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(){

        $getregister = DB::table('register')->orderBy('id', 'ASC')->get();

        return view('/register')->with('getregister', $getregister);



    }

    public function create(Request $req){

        $req->validate([
            'firstname' => 'required', 'string', 'max:255',
            'lastname' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255',
            // 'password' => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
         ]);


        $createregister = new Register();
        $createregister->firstname = $req->firstname;
        $createregister->lastname = $req->lastname;
        $createregister->address = $req->address;
        $createregister->email = $req->email;
        $createregister->contact = $req->contact;
        $createregister->password = $req->password;

        $createregister->save();

        return redirect('/register')->with('success','Successfully saved');
    }


    public function delete($id){
        register::find($id)->delete();
        return redirect('/register')->with('success','Successfully Deleted');

    }


    public function edit($id){
        $getregister = DB::table('register')->get();

        $getregone = Register::where('id',$id)->first();
        return view('/register')->with('getregone', $getregone)->with('getregister', $getregister);
    }

    public function update(Request $req){


        register::where('id', $req->id)
       ->update([
           'firstname' => $req->firstname,
           'lastname' => $req->lastname,
           'address' => $req->address,
           'email' => $req->email,
           'contact' => $req->contact,

        ]);
        return redirect('/register');
    }

    public function search(Request $req){
        $searchres = Register::where('firstname', 'like', '%'. $req->searchv . '%')->get();
        return view('search')->with('searchres', $searchres);
    }


    

}
