<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //$posts=post::all();
       $posts=post::get();
       return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //first method to store data in database

        // $post=new post();
        // $post->title =$request->title;
        // $post->body =$request->body;
        // $post->save();

         //second method to store data in database

         post::create(
            [
                // 'field name in database'=> 'text name in form'
                'title'=> $request->title,
                'body'=>$request->body

               
            ]
            );
            // to store data without mention fields names

            // post::create(
            //     $request->all()
            
            // );
            return redirect()->route('posts.index');
             
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post=post::findOrFail($id);
      
        return view('posts.edit',compact('post'));




        // in case -> find($id) only
        // if($post) {
        // }else{
        //     return response('خطأ لا يوجد هذا الرقم');
        // }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //الطريقة الاولي
        // $post=post::findorfail($id);
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->save();
        //return redirect()->route('posts.index'); // first function

        //الطريقة الثانية
        $post=post::findorfail($id);
        $post->update([
          //  $request->all();// without []
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect()->route('posts.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //first method
       post::findorfail($id)->delete();
        // or 
         //post::findorfail($id)->truncate(); //عشان يخلي العد مظبوط
         //truncate () can not using with SoftDelete

       //second method
       //post::destroy($id);
       return redirect()->route('posts.index');

       
    }
    //this function for restoer data ->softdeleteing
    public function show()
    {
      $posts=post::onlyTrashed()->get();
      return view('posts.soft',compact('posts'));
    }
    public function softdelete($id)
    {
        post::withTrashed()->where('id',$id)->ForceDelete();
        return response('تم الحذف نهائيًا');
    }
   
}
