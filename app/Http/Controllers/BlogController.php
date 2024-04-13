<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
      public function index(Request $request){

        $getblogs = DB::table('blog')->orderBy('id','ASC')->get();
    
        // return redirect('/blog');
        return view('/blog')->with('getblogs', $getblogs);
    }


    public function create(Request $request){

        $request->validate([
            
            'email' => 'required', 'string', 'email', 'max:255',
        ]);

        $blogto= new Blog();
        $blogto->title = $request->title;
        $blogto->discription = $request->discription;
        $blogto->email = $request->email;
        $blogto->contact = $request->contact;
    
        $blogto->save();
    
        // return redirect('/blog');
        return redirect('/blog')->with('success','Successfully saved');
    }

    public function delete($id){
        Blog::find($id)->delete();
        return redirect('/blog')->with('success','Successfully Deleted');
    }

    public function edit($id){
         $getblogs = DB::table('blog')->get(); // fetch multiple rows

        // $getblogone = DB::table('blog')->where('id', $id)->first();
        $getblogone = Blog::where('id', $id)->first();

        return view('/blog')->with('getblogone', $getblogone)->with('getblogs', $getblogs);
    }

    public function update(Request $request){

        blog::where('id', $request->id)
        ->update([
            'title' => $request->title,
            'discription' => $request->discription,
            'email' => $request->email,
            'contact' => $request->contact,
 
         ]);
         return redirect('/blog');

    }

    public function search(Request $request){
        $searchres = Blog::where('title', 'like', '%'. $request->searchv . '%')->get();
        return view('search')->with('searchres', $searchres);
    }



}
