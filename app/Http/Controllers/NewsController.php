<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function index(){

        $getnews = DB::table('news')->get();
    
        return view('/news')->with('getnews', $getnews);

    }

    public function create(Request $req){

        $createnews = new News();
        $createnews->title = $req->title;
        $createnews->description = $req->description;
        $createnews->email = $req->email;
        $createnews->contact = $req->contact;

        $createnews->save();

        return redirect('/news')->with('success','Successfully saved');

    }

    public function delete($id){
        news::find($id)->delete();
        return redirect('/news')->with('success','Successfully Deleted');
    }

    public function edit($id){
        $getnews = DB::table('news')->get(); // fetch multiple rows

       // $getnewsone = DB::table('news')->where('id', $id)->first();
       $getnewsone = News::where('id', $id)->first();

       return view('/news')->with('getnewsone', $getnewsone)->with('getnews', $getnews);
    
    }

    public function update(Request $request){

        news::where('id', $request->id)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'email' => $request->email,
            'contact' => $request->contact,
 
         ]);
         return redirect('/news');

        }

    public function search(Request $request){
        $searchres = News::where('title', 'like', '%'. $request->searchv . '%')->get();
         return view('search')->with('searchres', $searchres);
        }


}
