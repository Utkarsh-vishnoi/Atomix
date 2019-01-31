<?php

namespace Atomix;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class Atom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'skel', 'style', 'func'
    ];

    protected $appends = ['preview_url'];

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

    public function getPreviewUrlAttribute() {
        return route('preview', [ 'id' => $this->id ]);
    }

    public function scopeExclude($query,$value = array()) 
    {
        return $query->select(array_diff(Schema::getColumnListing($this->getTable()), $value));
    }
}
