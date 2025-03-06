<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Exception;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(CrateIdeaRequest $request)
    {

    //    $validated = request()->validate(
    //         [
    //             'content' => 'required'
    //         ],
    //         [
    //             'content.required'=>'This is required'
    //         ]
    //     );
    //    $validated['user_id']=auth()->id();

        Idea::create([
            'user_id'=>auth()->id(),
            'content'=>$request->content,
        ]);

        return redirect()->route('dashboard')->with('success', 'Shared successfully');
    }

    public function show(Idea $idea)
    {
        return view('shared.show-idea', compact('idea'));
    }

    public function edit(Idea $idea)
    {

        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
       // $this->authorize('idea.edit',$idea);
        $this->authorize('update',$idea);
        $editing = true;
        return view('shared.show-idea', compact('idea','editing'));
    }

    public function update(UpdateIdeaRequest $request, Idea $idea){
        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        //$this->authorize('idea.edit',$idea);
      //  $this->authorize('update',$idea);
        // $request->validate(
        //     [
        //         'content' => 'required'
        //     ],
        //     [
        //         'content.required'=>'This is required'
        //     ]
        // );

        //$idea->content = $request->get('content','');
        $idea->content = $request->content;
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

        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        //$this->authorize('idea.delete',$idea);
        $this->authorize('delete',$idea);
        try {
            $idea->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } catch (Exception $exception) {
            return abort(404);
        }
    }
}
