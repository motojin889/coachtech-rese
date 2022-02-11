<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'restaurant_id');
    }
}
