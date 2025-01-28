<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = Idea::orderBy('created_at','DESC')->paginate(5);
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
