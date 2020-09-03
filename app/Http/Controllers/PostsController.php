<?php
namespace App\Http\Controllers;
# Load Fakers own autoloader
//require_once '/path/to/Faker/src/autoload.php';
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Faker\Factory;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::orderBy('created_at','DESC')->paginate(3);
        $lastAddedPosts=Post::orderBy('created_at','DESC')->take(3)->get();
        return view('post.posts',['post'=>$post,'lastAddedPosts'=>$lastAddedPosts]);



        // $faker = Faker\Factory::create();
        // $post= new Post();
        // for ($i = 0; $i < 100; $i++) {
        //     $post->title= $faker->title;
        //     $post->body= $faker->text;
        //     $post->file= $faker->imageUrl($width = 640, $height = 480);
        //     $post->user_id= $faker->user_id;
        //     $post->save();
        //   }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->all());
       $file=$request->file('file');
       $name=$file->getClientOriginalName();
       $file->move(public_path().'/image/',$name);
       $post=new Post();
       $post->title=$request->title;
       $post->body=$request->body;
       $post->user_id = auth()->user()->id;
       //$post->user_id = Auth()->user()->id;
       $post->cathegory_id=1;
       $post->file=$name;
       $post->save();
       return redirect('/posts')->with('success','Article a été ajouté avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    $post=Post::findOrFail($id);
    //dd($post);
    $lastAddedPosts=Post::orderBy('created_at','DESC')->take(3)->get();

    return view('post.show',compact('post','lastAddedPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
        if($request->hasFile('file')){
            $file=$request->file('file');
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/image/',$name);
            $post->file=$name;
        }
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id = auth()->user()->id;
        //$post->user_id = Auth()->user()->id;
        $post->cathegory_id=1;

        $post->save();
        return redirect('posts')->with('warning','Article a été modifié avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::findOrFail($id)->delete();
        return redirect('posts')->with('danger','Article a été supprimé avec succes');
    }
}
