<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //NOTA: uso compact porque la variable tiene el mismo nombre de la llave del array y es como resumir esa parte (en lugar de array uso compact)
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('hola');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //salvar

        //dd($request);
        
        $post = Post::create([
            'user_id' => auth()->user()->id

        ] + $request->all() );

        //imagen

        //si recibimos un archivo, entonces
        if($request->hasFile('img') and $request->file('img')->isValid())
        {

            //salvamos esa imagen en la carpeta de almacenamiento y me retorne la url
            //file y store son metodos de laravel
            $post->img = $request->file('img')->store('posts','public');

            $post->save();
        }

        
        //retorno a la vista anterior (vista crear) y uso una variable de entorno para mandar el mensaje exito 
        return back()->with('status', 'Creado con exito');
        //retornar*/
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
