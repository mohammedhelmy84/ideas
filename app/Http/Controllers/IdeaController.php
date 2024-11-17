<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Exception;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate(
            [
                'content' => 'required'
            ],
            [
                'content.required'=>'This is required'
            ]
        );
        $idea =  Idea::create(
            [
                'content' => request()->get('idea', ''),
            ],
        );

        return redirect()->route('dashboard')->with('success', 'ok');
    }

    public function show(Idea $idea)
    {
        return view('shared.show-idea', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('shared.show-idea', compact('idea','editing'));
    }

    public function update(Idea $idea){
        request()->validate(
            [
                'content' => 'required'
            ],
            [
                'content.required'=>'This is required'
            ]
        );

        $idea->content = request()->get('content','');
        $idea->save();

        return redirect()->route('dashboard')->with('success', 'ok');
    }

    public function search(){
       $search=request()->search;
       $idea = Idea::where('content','%',$search);
       return $idea;
    }

    public function destroy(Idea $idea)
    {
        try {
            $idea->delete();
            return redirect()->back()->with('delete', 'Deleted successfully');
        } catch (Exception $exception) {
            return abort(404);
        }
    }
}
