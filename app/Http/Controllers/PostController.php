<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Jobs\ChangePost;
use App\Mail\PostCreated as MailPostCreated;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostCreated as NotificationsPostCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        //-------> BU USER-NI TEKSHIRIB-SAYTGA KIRGIZADI
        $this->middleware('auth')->except(['index', 'show']);

        //-------> BU Resource-bo'lsa USER-NI CHECKLASH 
        $this->authorizeResource(Post::class, 'post');

        //-------> BU USER ISHLASHDAN OLDIN YANA PAROLNI-TEKSHIRADI 
        // $this->middleware('password.confirm')->only('edit');
    }
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
        $posts = Post::latest()->paginate(9);
        // $posts = Post::latest()->get();
        //---------> POST-LARNI CAECH-GA OLISH;DB::table('posts')->get();
        // Cache::pull('posts');
        // Cache::flush();
        // $posts = Cache::remember('posts', 120, function () {
        //     return Post::latest()->paginate(270);
        // });

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
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
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

        $post = Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
        // POST EVENTNI TARQATISH
        PostCreated::dispatch($post);

        // Queues-jobs FILE-LARNI SAQLASH
        ChangePost::dispatch($post)->onQueue('emails');

        // MAIL-HABAR YOUBORISH
        // Mail::to($request->user())->send(new MailPostCreated($post));

        // MAIL va QUEUE BILAN HABAR YOUBORISH
        Mail::to($request->user())->queue((new MailPostCreated($post))->onQueue('emails'));

        // MAIL va QUEUE BILAN HABAR YOUBORISHGA VAQT-BELGILASH
        // Mail::to($request->user())->later(now()->addMilliseconds(70), (new MailPostCreated($post))->onQueue('emails'));

        // // 1-usul Notification xabar bildirish
        // auth()->user()->notify(new NotificationsPostCreated($post));

        // 2-usul Notification xabar bildirish
        Notification::send(auth()->user(), new NotificationsPostCreated($post));

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
            'categories' => Category::all(),
            'tags' => Tag::all(),
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
        //----------> 1-usul BU USER-NI CHECKLASH 
        // if (!Gate::allows('update-post', $post)) {
        //     abort(403);
        // }

        //----------> 2-usul BU USER-NI CHECKLASH 
        // Gate::authorize('update-post', $post);
        // Gate::authorize('update', $post);

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
        //----------> BU USER-NI CHECKLASH 
        // Gate::authorize('update', $post);

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
