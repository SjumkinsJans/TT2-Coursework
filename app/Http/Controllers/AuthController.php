<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:3|max:26',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:5'
        ]);

        User::create($validated);
        Auth::attempt($validated);
        UserProfile::create([
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('user_profile.show',Auth::id());
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min:5'
        ]);

        if(Auth::attempt($validated)) {
            return redirect()->route('user_profile.show',Auth::id());
        }

        return back()->with('error','Couldn\'t log in, invalid email or password !');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
