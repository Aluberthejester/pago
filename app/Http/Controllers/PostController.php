<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|max:100',
            'descrip' => 'required|max:100',
            'salario' => 'required',
            'horario' => 'required',
            ]);
            $post = Post::create([
            'nombre' => $request->nombre,
            'descrip' => $request->descrip,
            'salario' => $request->salario,
            'horario' => $request->horario,
            ]);
            $post->save();
            return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'nombre' => 'required|max:100',
            'descrip' => 'required|max:100',
            'salario' => 'required',
            'horario' => 'required',
            ]);
            $post->fill([
                'nombre' => $request->nombre,
                'descrip' => $request->descrip,
                'salario' => $request->salario,
                'horario' => $request->horario,
            ]);
            $post->save();
            return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index');
    }
}
