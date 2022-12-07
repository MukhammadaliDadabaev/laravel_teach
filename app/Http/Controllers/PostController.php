<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //----------> GET-> LIST-RO'YXATLARNI BARCHASINI
    public function index()
    {
        //------------>  1-USUL post-qo'shish
        // $newPost = new Post;
        // $newPost->title = "Birinchi post 2";
        // $newPost->short_content = "New yangi Birinchi post 2";
        // $newPost->content = "Birinchi post ALI_1943 2";
        // $newPost->photo = "/2/birinchi_post.jpg";
        // $newPost->save();

        //------------>  2-USUL post-qo'shish
        // $posts = Post::create([
        //     'title' => 'Rouston to Paris',
        //     'short_content' => '3-short-content',
        //     'content' => "3-content",
        //     'photo' => "3_photo.phg"
        // ]);

        //--------> Yangilash 
        // $post = Post::find(3)->update(['title' => 'Namangan va']);

        //--------> 1-USUL O'CHIRISH
        // $post = Post::where('id', 4)->first();
        // $post->delete();

        //--------> 2-USUL O'CHIRISH
        // Post::destroy(4);

        //-------> O'CHIRILGANNI-TIKLASH 
        // Post::withTrashed()->find(4)->restore();

        //--------> BARCHASINI-OLISH
        // $posts = Post::all();
        // dd($posts);

        return "success";

        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //------------> GET-> POST-YARATISH SAHIFASI va FORMA
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //-------------> POST-> SO'ROV-YUBORISH FORMA-ORQALI
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //--------------> GET-> POSTLARNI ID-ORQALI 1-tasini KO'RISH
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
    //-------------> GET-> POSTLARNI ID-ORQALI UPDATE-GA YUBORADI
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //-------------> PUT-> POSTLARNI SO'ROV-YUBORIB ID-ORQALI YANGILAYDI
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //-----------> POSTLARNI- ID-ORQALI O'CHIRISH
    public function destroy($id)
    {
        //
    }
}