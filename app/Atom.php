<?php

namespace Atomix;

use Auth;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Atom extends Model
{
    use CanBeLiked;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'skel', 'style', 'func'
    ];

    protected $appends = ['preview_url', 'like_url', 'unlike_url', 'is_liked'];

    protected $hidden = [
        'user_id'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'skel' => 'AwA=',
        'style' => 'AwA=',
        'func' => 'AwA='
    ];

    public function user()
    {
    	return $this->belongsTo('Atomix\User');
    }

    public function getPreviewUrlAttribute()
    {
        return route('atom.preview', [ 'id' => $this->id ]);
    }

    public function getLikeUrlAttribute()
    {
        return route('atom.like', [ 'id' => $this->id ]);
    }

    public function getUnlikeUrlAttribute()
    {
        return route('atom.unlike', [ 'id' => $this->id ]);
    }

    public function getIsLikedAttribute()
    {
        return $this->isLikedBy(Auth::user());
    }

    public function scopeExclude($query,$value = array()) 
    {
        return $query->select(array_diff(Schema::getColumnListing($this->getTable()), $value));
    }
}
