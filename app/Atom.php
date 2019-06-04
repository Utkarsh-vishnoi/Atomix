<?php

namespace Atomix;

use Auth;

use Illuminate\Support\Facades\Redis;
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

    protected $appends = ['is_liked', 'likes_count', 'views_count'];

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

    public function getIsLikedAttribute()
    {
        return $this->isLikedBy(Auth::user());
    }

    public function getLikesCountAttribute()
    {
        return $this->likers()->count();
    }

    public function getViewsCountAttribute()
    {
        return Redis::get('Atom:views:' . $this->id) ? : 0;
    }

    public function scopeExclude($query,$value = array()) 
    {
        return $query->select(array_diff(Schema::getColumnListing($this->getTable()), $value));
    }
}
