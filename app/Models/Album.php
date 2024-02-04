<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'AlbumId';

    public function artist()
    {
        // albums.ArtistId is the foregin key
        return $this->belongsTo(Artist::class, 'ArtistId');
    }

    public function tracks()
    {
        return $this->hasMany(Track::class, 'AlbumId', 'AlbumId');
    }
}
