<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    protected $dates = [
        'day',
    ];

    public static $rules = array(
        'name' => 'required',
        'day' => 'required',
        'pref_id' => 'required',
        'image' => 'image',
        'content' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getPrefNameAttribute() {
        return config('pref.'.$this->pref_id);
    }
}
