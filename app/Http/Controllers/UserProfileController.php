<?php

namespace App\Http\Controllers;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Comic;
use App\Models\ComicImage;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct() {
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user_profiles.show', [
            'user_profile' => UserProfile::findOrFail($id),
            'user' => User::findOrFail($id),
            'comics' => Comic::latest()->where('author_id',$id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {

        $user_profile = UserProfile::findOrFail($id);
        if($request->user()->cannot('delete',$user_profile)) {
            abort(403,'You are not permited to edit this user profile');
        };

        return view('user_profiles.edit', [
            'user_profile' => $user_profile,
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $user_profile)
    {
        if($request->user()->cannot('update',$user_profile)) {
            abort(403,'You are not permited to update this user profile');
        };


        $validated = $request->validate([
            'description' => 'string|nullable',
            'profile_picture' => 'image|nullable|mimes:png,jpg,jpeg,gif|',
        ]);

        if($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures','public');
            if($user_profile->profile_picture != 'profile_pictures/default_picture.png') {
                Storage::disk('public')->delete($user_profile->profile_picture);
            }

            $validated['profile_picture'] = $imagePath;  
        }

        
            
        $user_profile->update($validated);

        return redirect()->route('user_profile.show',$user_profile)->with('success','User Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, UserProfile $user_profile)
    {

        if($request->user()->cannot('update',$user_profile)) {
            abort(403,'You are not permited to destroy this user profile');
        };


        
        $id = $user_profile->user_id;
        if(Auth::id() == $id) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        
        $comments = Comment::where('user_id',$id)->delete();
        $comics = Comic::where('author_id',$id);
        ComicImage::whereIn('comic_id',$comics->pluck('id'))->delete();
        Comment::whereIn('comic_id',$comics->pluck('id'))->delete();
        $comics->delete();
        
        $user_profile->delete();
        User::find($id)->delete();
        return redirect()->route('main.index')->with('success','Account deleted successfully');
    }
}
