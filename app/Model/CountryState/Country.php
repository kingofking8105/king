<?php

namespace App\Model\CountryState;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'code'
    ];
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
