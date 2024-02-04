@extends('layout')

@section('title', 'Albums')

@section('main')
    <h1>Albums</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('album.create') }}" class="btn btn-secondary">New album</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album</th>
                <th>Artist</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
                    <td>
                        <a href="{{ route('album.show', [ 'id' => $album->AlbumId ]) }}">
                            {{ $album->Title }}
                        </a>
                    </td>
                    <td>
                        {{ $album->artist->Name }}
                    </td>
                    <td>
                        <a href="{{ route('album.edit', [ 'id' => $album->AlbumId ]) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection