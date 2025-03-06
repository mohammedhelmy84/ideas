<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->idea()->paginate();
        return view('users.show',compact('user','ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $ideas = $user->idea()->paginate();
        return view('users.edit',compact('user','editing','ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request , User $user)
    {
        $validated = $request->validate([
         'name'=>'required|min:3|max:40',
         'bio'=>'nullable|min:1|max:255',
         'image'=>'image'
        ]);

        if($request->has('image')){
          $imagePath = $request->file('image')->store('profile','public');
          $validated['image'] = $imagePath;
          Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile(){
       return $this->show(auth()->user());
    }
}
