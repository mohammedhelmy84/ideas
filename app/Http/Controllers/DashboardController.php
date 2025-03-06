<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = Idea::withCount('likes')->with('user','comments.user')->orderBy('created_at','DESC')->paginate(5);
        $auth  = Auth::id();
        $user = User::where('id',$auth)->first();
        // $idea->content = 'test';
        // $idea->likes = 1;
        if(request()->has('search')){
            $idea = Idea::where('content','like','%'.request()->get('search').'%')->paginate(5);
        }

        return view('dashboard',[
            'ideas'=>$idea,
            'user'=>$user
        ]);
    }

}
