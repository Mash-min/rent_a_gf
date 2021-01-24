<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
    	'tag',
    	'girlfriend_id'
    ];

    public function girlfriend()
    {
    	return $this->belongsTo('App\Models\Girlfriend', 'girlfriend_id');
    } 

}
