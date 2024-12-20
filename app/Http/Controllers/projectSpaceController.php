<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class projectSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projectSpace.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $post = Post::where('slug', $slug)->first();
        $featured_image=$post?->featured_image;
        $excerpt=$post?->excerpt;
        $title=$post?->title;
        return view('projectSpace.view',compact('slug','featured_image','excerpt','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
