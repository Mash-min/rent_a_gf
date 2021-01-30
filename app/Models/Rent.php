<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'girlfriend_id',
    	'status',
    	'schedule',
    	'price'
    ];

    protected $attributes = [
    	'status' => 'pending'
    ];

    public function user() 
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }	

    public function girlfriend()
    {
    	return $this->belongsTo('App\Models\Girlfriend', 'girlfriend_id');
    }
}
