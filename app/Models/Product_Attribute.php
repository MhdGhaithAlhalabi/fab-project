<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
// use Astrotomic\Translatable\Translatable;

class Product_Attribute extends Model
{
    use HasFactory;
    //use Translatable;
    protected $table = 'products_attributes';
    //protected $fillable = ['product_id','attribute_id'];
    protected $guarded = false;
    //public $translatedAttributes = ['values'];
    protected $primaryKey = ['product_id','attribute_id'];
}
