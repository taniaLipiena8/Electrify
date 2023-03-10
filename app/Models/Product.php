<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
   use HasFactory, SoftDeletes;

   protected $guarded = ['id'];
   protected $dates = ['deleted_at'];

   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function cart()
   {
      return $this->hasMany(Cart::class);
   }
}
