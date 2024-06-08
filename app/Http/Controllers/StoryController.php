<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function show(Story $story)
    {
        // return view('story.show', [
        //     'story' => $story
        // ]);
        // dd($story->comments);
        return view('story.show', compact('story'));
    }

    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:4|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        Story::create($validated);

        // $story = Story::create([
        //     'content' => request()->get('content', '')
        // ]);

        return redirect()->route('home')->with('success', 'Your Story is now shared.');
    }

    public function edit(Story $story)
    {
        if(auth()->id() !== $story->user_id)
        {
            abort(404, "Go back playboi");
        }
        
        $editing = true;
        return view('story.show', compact('story', 'editing'));
    }

    public function update(Story $story)
    {
        if(auth()->id() !== $story->user_id)
        {
            abort(404, "Go back playboi");
        }

        $validated =  request()->validate([
            'content' => 'required|min:4|max:240'
        ]);

        $story->update($validated);

        // $story -> content = request()->get('content', '');
        // $story -> save();
        return redirect()->route('submit.show', $story->id)->with('success', "Story has been updated");
    }

    public function destroy(Story $story)
    {
        if(auth()->id() !== $story->user_id)
        {
            abort(404, "Go back playboi");
        }
        // $story = Story::where('id', $id)->firstOrFail()->delete();
        $story->delete();

        return redirect()->route('home')->with('success', 'Your Story is now deleted.');
    }

}
