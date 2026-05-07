<?php

namespace App\Http\Controllers\Contents;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContentStoreRequest;
use App\Http\Requests\Content\ContentUpdateRequest;
use App\Models\Content;
use App\Models\Module;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $module = Module::pluck('id', 'title');
        $content = new Content();
        return view('lms.content.create', compact('module', 'content'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentStoreRequest $request)
    {
        $request ->validated();
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentUpdateRequest $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        //
    }
}
