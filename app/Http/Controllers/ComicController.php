<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Comic;
use App\Models\ComicImage;
use App\Models\User;
use App\Models\ComicGenre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $comics = Comic::latest()->get();
        return view('main.index',compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create',\App\Models\Comic::class)) {
            abort(403,'You are not permited to create');
        };

        $genres = ComicGenre::all();
        return view('comics.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->user()->cannot('store',\App\Models\Comic::class)) {
            abort(403,'You are not permited to upload');
        };



        $validated = $request->validate([
            'cover_image' => 'image|mimes:png,jpg,jpeg,gif',
            'title' => 'required|min:3|max:255',
            'description' => 'required',
            'comic_genre_id' => 'required',
        ]);

        if($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('cover_images','public');
            $validated['cover_image'] = $imagePath;
        }
        
        $validated['author_id'] = Auth::id();
        

        if($request->hasFile('pages')) {
            $comic = Comic::create($validated);
            foreach($request->file('pages') as $index=>$imagePath) {
                $comicImage = $imagePath->store('comic_pages','public');
                ComicImage::create([
                    'comic_id' => $comic->id,
                    'page' => $index + 1,
                    'image'=> $comicImage,
                ]);
            }
        }
        return redirect()->route('main.index')->with('success','Comic uploaded successfully !');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        $pages = ComicImage::where('comic_id',$comic->id)->get();
        $author = User::find($comic->author_id);
        $genre = ComicGenre::find($comic->comic_genre_id);
        return view('comics.show',compact(['comic','genre','author','pages']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Comic $comic)
    {
        if($request->user()->cannot('update',$comic)) {
            abort(403,'You are not permited to update this comic !');
        };

        $pages = ComicImage::where('comic_id',$comic->id)->get();
        $genres = ComicGenre::all();
        return view('comics.edit',compact(['comic','genres','pages']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        if($request->user()->cannot('update',$comic)) {
            abort(403,'You are not permited to update this comic !');
        };

        $validated = $request->validate([
            'cover_image' => 'image|mimes:png,jpg,jpeg,gif',
            'title' => 'required|min:3|max:255',
            'description' => 'required',
            'comic_genre_id' => 'required',
        ]);

        if($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('cover_images','public');
            if($comic->cover_image != 'cover_images/default_cover.png') {
                Storage::disk('public')->delete($comic->cover_image);
            }
            $validated['cover_image'] = $imagePath;
            
        }

        
        $original_pages = $request->input('original_path');
        $changed_originals = $request->file('changes');

        $pagesToDelete = ComicImage::where('comic_id',$comic->id)->whereNotIn('image', $original_pages)->get();
        foreach ($pagesToDelete as $page) {
            Storage::disk('public')->delete($page->image); 
            $page->delete(); 
        }


        $change_map = [];
        foreach($original_pages as $i=>$path) {
            $change_map[$path] = $changed_originals[$i] ?? null;
        }

        foreach($change_map as $original_path => $uploaded_file) {
            if($uploaded_file) {
                $new_path = $uploaded_file->store('comic_pages','public');
                ComicImage::where('comic_id', $comic->id)
                ->where('image',$original_path)
                ->update(['image' => $new_path]);
                Storage::disk('public')->delete($original_path);
            }

        }

        if($request->hasFile('new_pages')) {
            foreach($request->file('new_pages') as $index=>$imagePath) {
                $comicImage = $imagePath->store('comic_pages','public');
                ComicImage::create([
                    'comic_id' => $comic->id,
                    'page' => $index + 1,
                    'image'=> $comicImage,
                ]);
            }
        }

        

        $comic->update($validated);
        return redirect()->route('comic.show',$comic)->with('success','Comic updated succesfully !');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comic $comic)
    {
        if($request->user()->cannot('delete',$comic)) {
            abort(403,'You are not permited to destroy this comic');
        };

        if ($comic->comic_cover != 'cover_images/default_cover.png') {
            Storage::disk('public')->delete($comic->cover_image);
        }

        $pages = ComicImage::where('comic_id',$comic->id)->get();
        foreach($pages as $page) {
            Storage::disk('public')->delete($page->image);
            $page->delete();
        }

        $comic->delete();

        return redirect()->route('main.index')->with('success','Comic deleted successfully !');
    }
}
