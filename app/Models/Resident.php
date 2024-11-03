<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $fillable    = ['name', 'email',];
   
       public static function boot()
       {
           parent::boot();
   
           static::creating(function ($model) {
               $model->resident_id = generateUserFriendlyUniqueId();
           });
       }
}
