<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // 
    }

    /**
     * Show the form for creating a new resource.
     //*
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request, Books $books)
    {

    $data=request()->validate([
        'title' => 'required|unique:books|max:200',
        'slug' => 'nullable',
        'author'=> 'required',
    ]);
        $books->create($data);
        return redirect('/books/'. $books->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {

        $data=request()->validate([
            'title' => 'required|unique:books|max:200',
            'slug'=>'nullable',
            'author'=> 'required',
        ]);
        $books->update($data);
        return redirect($books->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books)
    {
        $books->delete();
        return redirect('/books');
    }
    public function test($slug){
        $books= Books::where('slug', $slug);
    }
}
