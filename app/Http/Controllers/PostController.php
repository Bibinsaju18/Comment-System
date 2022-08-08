<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function index()
    {
       $posts = Post::all();

       return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048',
        ]);

        if ($validator->fails()) {

            return redirect('post')
                        ->withErrors($validator)
                        ->withInput();
        }
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('images/uploads');
        $date = date('Y-m-d');
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $name,
            'path' =>  $path,
            'slug' => \Str::slug($request->title),
            'date' => $date
        ]);

        return redirect()->back()->with([
            'success' => 'Blog created successfully!',
        ]);

    }

    public function show(Post $post) {

        return view('post.single',compact('post'));

    }
}
