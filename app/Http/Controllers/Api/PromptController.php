<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prompt; // Import model
use App\Http\Requests\PromptRequest; // Import request
use Illuminate\Http\Request;

class PromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Prompt::all();
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
    public function store(PromptRequest $request)
    {
        $validated = $request->validated();

        $prompt = Prompt::create($validated);

        return $prompt;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Prompt::findOrFail($id);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromptRequest $request, string $id)
    {
        $validated = $request->validated();

        $prompt = Prompt::findOrFail($id);

        $prompt -> update($validated);

        return $prompt;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prompt = Prompt::findOrFail($id);

        $prompt->delete();

        return $prompt;
    }
}
