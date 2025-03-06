<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
    
        $idea = Idea::with('user','comments.user')->orderBy('created_at','DESC')->paginate(5);
        // $idea->content = 'test';
        // $idea->likes = 1;
        if(request()->has('search')){
            $idea = Idea::where('content','like','%'.request()->get('search').'%')->paginate(5);
        }

        return view('dashboard',[
            'ideas'=>$idea
        ]);
    }
}
