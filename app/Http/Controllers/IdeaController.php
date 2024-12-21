<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Exception;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {

       $validated = request()->validate(
            [
                'content' => 'required'
            ],
            [
                'content.required'=>'This is required'
            ]
        );
        $validated['user_id']=auth()->id();

         Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Shared successfully');
    }

    public function show(Idea $idea)
    {
        return view('shared.show-idea', compact('idea'));
    }

    public function edit(Idea $idea)
    {

        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $editing = true;
        return view('shared.show-idea', compact('idea','editing'));
    }

    public function update(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
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

        if(auth()->id() !== $idea->user_id){
            abort(404);
        }

        try {
            $idea->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } catch (Exception $exception) {
            return abort(404);
        }
    }
}
