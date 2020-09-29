<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
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
}
