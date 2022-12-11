<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //----------> GET-> LIST-RO'YXATLARNI BARCHASINI
    // public function index()
    // {
    //     //------------>  1-USUL post-qo'shish
    //     // $newPost = new Post;
    //     // $newPost->title = "Birinchi post 2";
    //     // $newPost->short_content = "New yangi Birinchi post 2";
    //     // $newPost->content = "Birinchi post ALI_1943 2";
    //     // $newPost->photo = "/2/birinchi_post.jpg";
    //     // $newPost->save();

    //     //------------>  2-USUL post-qo'shish
    //     // $posts = Post::create([
    //     //     'title' => 'Rouston to Paris',
    //     //     'short_content' => '3-short-content',
    //     //     'content' => "3-content",
    //     //     'photo' => "3_photo.phg"
    //     // ]);

    //     //--------> Yangilash 
    //     // $post = Post::find(3)->update(['title' => 'Namangan va']);

    //     //--------> 1-USUL O'CHIRISH
    //     // $post = Post::where('id', 4)->first();
    //     // $post->delete();

    //     //--------> 2-USUL O'CHIRISH
    //     // Post::destroy(4);

    //     //-------> O'CHIRILGANNI-TIKLASH 
    //     // Post::withTrashed()->find(4)->restore();

    //     //--------> BARCHASINI-OLISH
    //     // $posts = Post::all();
    //     // dd($posts);

    //     return "success";

    //     return view('posts.index');
    // }
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //------------> GET-> POST-YARATISH SAHIFASI va FORMA
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //-------------> POST-> SO'ROV-YUBORISH FORMA-ORQALI
    public function store(StorePostRequest $request)
    {
        // //---------->  1-USUL fayl-ni nomsiz-saqlash
        // $path = $request->file('photo')->store('post-photos');

        //---------->  2-USUL fayl-ni uzini nomi-bilan saqlash
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }

        Post::create([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //--------------> GET-> POSTLARNI ID-ORQALI 1-tasini KO'RISH
    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //-------------> GET-> POSTLARNI ID-ORQALI UPDATE-GA YUBORADI
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //-------------> PUT-> POSTLARNI SO'ROV-YUBORIB ID-ORQALI YANGILAYDI
    public function update(StorePostRequest $request, Post $post)
    {
        //---------->  2-USUL fayl-ni uzini nomi-bilan saqlash
        if ($request->hasFile('photo')) {

            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }

        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $post->photo,
        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //-----------> POSTLARNI- ID-ORQALI O'CHIRISH
    public function destroy(Post $post)
    {
        if (isset($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();
        return redirect()->route('posts.index');
    }
}
