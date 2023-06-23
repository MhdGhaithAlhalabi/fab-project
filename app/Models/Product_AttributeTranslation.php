<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_AttributeTranslation extends Model
{
    use HasFactory;
    protected $table = 'product_attribute_translations';
    public $timestamps = false;
    protected $fillable = ['values'];
}
