<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'feedback',
        'user_id',
        'girlfriend_id'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function girlfriend()
    {
      return $this->belongsTo('App\Models\Girlfriend', 'user_id');
    }

}
