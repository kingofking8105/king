<?php

namespace App\Model\Poc;

use Illuminate\Database\Eloquent\Model;
use App\Model\Donor\Donor;
use App\Model\Pngo\Pngo;


class Poc extends Model
{   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'slug_id',
        'slug_name',
        'poc_name',
        'poc_mobile',
        'poc_landline',
        'poc_email',
        'poc_designation',
        'poc_status',
    ];
    public function donor(){
        return $this->belongsTo(Donor::class,'slug_id')->where('slug_name','Donor');
     }
     public function pngo(){
        return $this->belongsTo(Pngo::class,'slug_id')->where('slug_name','Pngo');;
     }
    
}
