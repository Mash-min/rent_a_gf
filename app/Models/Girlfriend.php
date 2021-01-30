<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Girlfriend extends Model
{
    use HasFactory;

    protected $fillable = [
    	'username',
    	'description',
    	'rate',
    	'status',
    	'user_id',
    	'availability'
    ];

    protected $attributes = [
    	'availability' => true,
    	'status' => 'pending'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function tags()
    {
      return $this->hasMany('App\Models\Tags', 'girlfriend_id');
    }

    public function rents()
    {
      return $this->hasMany('App\Models\Rent', 'girlfriend_id');
    }

}
