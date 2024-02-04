<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with(['artist'])->orderBy('Title')->get();

        return view('album/index', [
            'albums' => $albums,
        ]);
    }

    public function create()
    {
        return view('album/create', [
            'artists' => Artist::orderBy('Name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'artist' => 'required|exists:artists,ArtistId',
        ]);

        $album = new Album();
        $album->Title = $request->input('title');
        $album->ArtistId = $request->input('artist');
        $album->save();

        return redirect()
            ->route('album.index')
            ->with('success', "Successfully created {$request->input('title')} by {$album->artist->Name}");
    }

    public function edit($albumId)
    {
        return view('album/edit', [
            'album' => Album::find($albumId),
            'artists' => Artist::orderBy('Name')->get(),
        ]);
    }

    public function update(Request $request, $albumId)
    {
        $request->validate([
            'title' => 'required|max:20',
            'artist' => 'required|exists:artists,ArtistId',
        ]);

        $album = Album::find($albumId);
        $album->Title = $request->input('title');
        $album->ArtistId = $request->input('artist');
        $album->save();

        return redirect()
            ->route('album.index')
            ->with('success', "Successfully updated {$request->input('title')} by {$album->artist->Name}");
    }

    public function show($albumId)
    {
        return view('album/show', [
            // with eager loading
            'album' => Album::with(['tracks.genre'])->find($albumId),

            // without eager loading. lots of duplicate queries.
            // 'album' => Album::find($albumId),
        ]);
    }
}
