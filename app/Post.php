<?php

namespace App;

use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class);
    }

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     return array('id' => $array['id']);
    // }

    public function searchableAs()
    {
        return 'post_index';
    }
}
