<?php
namespace App\Http\Controllers;
# Load Fakers own autoloader
//require_once '/path/to/Faker/src/autoload.php';

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($id)
    {
        //
    }
}
