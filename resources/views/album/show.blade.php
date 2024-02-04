@extends('layout')

@section('title', "Album: {$album->Title}")

@section('main')
    <h1>{{ $album->Title }}</h1>
    <p>{{ $album->artist->Name }}</p>

    <p>Count: {{ count($album->tracks) }}</p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Track</th>
                <th>Genre</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($album->tracks as $track)
                <tr>
                    <td>{{ $track->Name }}</td>
                    <td>{{ $track->genre->Name }}</td>
                    <td>${{ $track->UnitPrice }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection