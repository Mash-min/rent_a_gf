<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'contact',
        'address',
        'image',
        'bio',
        'birthdate',
        'email',
        'password',
    ];

    protected $attributes = [
      'image' => 'no-image.jpg',
      'role' => 'user',
      'bio' => "",
      'address' => 'not-set'
    ];

    public function rents()
    {
      return $this->hasMany('App\Models\Rent', 'user_id');
    }

    public function girlfriend()
    {
      return $this->hasOne('App\Models\Girlfriend', 'user_id'); 
    }

    public function alreadyRegisteredGirlfriend()
    {
      $girlfriend = $this->girlfriend()->where('user_id','=',$this->id)->get();
      if ($girlfriend->count() >= 1) {
        return true;
      }else {
        return false;
      }
    }

    public function alreadyRented($girlfriend_id)
    {
      $rent = Rent::where([
        ['user_id' , '=', $this->id],
        ['girlfriend_id', '=', $girlfriend_id]
      ])->get();

      if ($rent->count() >= 1) {
        return true;
      }else {
        return false;
      };
    }

    public function alreadyHasRent()
    {
      $activeRent = $this->rents()
                         ->where('user_id','=',$this->id,'&&','status','=', 'active')
                         ->orWhere('user_id','=',$this->id,'&&','status','=', 'pending')
                         ->get();
      if ($activeRent->count() >= 1) {
        return true;
      }else {
        return false;
      }
    }

    public function alreadyInMyRent($girlfriend_id)
    { 
      $rent = $this->rents()
                   ->where('user_id','=',$this->id,'&&','status','=', 'active','&&','girlfriend_id','=',$girlfriend_id)
                   ->orWhere('user_id','=',$this->id,'&&','status','=', 'pending','&&','girlfriend_id','=',$girlfriend_id)
                   ->first();
      if ($rent->count() >= 1) {
        return true;
      }else {
        return false;
      }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
