<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function search()
    {
        
        $story = Story::orderBy('created_at', 'DESC');

        if(request()->has('search'))
        {
            $story = $story->where('content', 'like', '%' . request()->get('search', '') . '%');
        }
        return view('explore',[
            'stories' => $story->paginate(5)
        ]);
    }
}
