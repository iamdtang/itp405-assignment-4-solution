@extends('layout')

@section('title', "Edit album: {$album->Title}")

@section('main')
    <h1>Edit album: {{ $album->Title }}</h1>

    <form action="{{ route('album.update', [ 'id' => $album->AlbumId ]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $album->Title) }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select name="artist" id="artist" class="form-select">
                <option value="">-- Select Artist --</option>
                @foreach ($artists as $artist)
                    <option
                        value="{{ $artist->ArtistId }}"
                        {{ (string) $artist->ArtistId === (string) old('artist', $album->ArtistId) ? "selected" : "" }}
                    >
                        {{ $artist->Name }}
                    </option>
                @endforeach
            </select>
            @error('artist')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection