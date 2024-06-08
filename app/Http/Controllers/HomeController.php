<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $story = new Story([
        //     'content' => 'Ma Story.',
        // ]);
        // $story = new Story();
        // $story->content = "test";
        // $story->likes=0;
    

        return view('home', [
            // 'stories' => Story::orderBy('created_at', 'DESC')->get()
            'stories' => Story::orderBy('created_at', 'DESC')->paginate(5)
        ]);
        // return view('home');
    }

}
