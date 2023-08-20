<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('check') -> only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        return "Hello JavaTpoint: " . $id;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "This is the create method.";
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
    public function show(string $id)
    {
        return "show method is called and ID is: ". $id;
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
    public function display() {
        return view('student');
    }
}
