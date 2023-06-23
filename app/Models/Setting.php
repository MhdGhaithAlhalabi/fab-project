<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

//use phpDocumentor\Reflection\Types\Self_;

class Setting extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = [
        'title_first_left',
        'title_first_right',
        'title_first_right2',
        'title_second_left',
        'title_second_right',
        'title_third',
        'uptitle_first_left',
        'uptitle_first_right',
        'downtitle_first_left',
        'downtitle_first_right2',
        'downtitle_second_left',
        'downtitle_second_right',
        'downtitle_third',
    ];
    protected $fillable = [
        'id',
        'facebook',
        'instagram',
        'phone',
        'telegram',
        'tiktok',
        'logo_w',
        'logo_b',
        'favicon',
        'image_first_left',
        'image_first_right',
        'image_second_left',
        'image_second_right',
        'image_third',
        'created_at',
        'updated_at',
        'downprice_first_left',
        'downprice_first_right',
        'downprice_third'
    ];
    public function getLogobUrlAttribute()
    {
        if (!$this->logo_b) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->logo_b, ['http://', 'https://'])) {
            return $this->logo_b;
        }
        return asset('storage/' . $this->logo_b);
    }

    public function getLogowUrlAttribute()
    {
        if (!$this->logo_w) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->logo_w, ['http://', 'https://'])) {
            return $this->logo_w;
        }
        return asset('storage/' . $this->logo_w);
    }

    public function getFaviconUrlAttribute()
    {
        if (!$this->favicon) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->favicon, ['http://', 'https://'])) {
            return $this->favicon;
        }
        return asset('storage/' . $this->favicon);
    }

    public function getFirstLeftUrlAttribute()
    {
        if (!$this->image_first_left) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image_first_left, ['http://', 'https://'])) {
            return $this->image_first_left;
        }
        return asset('storage/' . $this->image_first_left);
    }

    public function getFirstRightUrlAttribute()
    {
        if (!$this->image_first_right) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image_first_right, ['http://', 'https://'])) {
            return $this->image_first_right;
        }
        return asset('storage/' . $this->image_first_right);
    }

    public function getSecondRightUrlAttribute()
    {
        if (!$this->image_second_right) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image_second_right, ['http://', 'https://'])) {
            return $this->image_second_right;
        }
        return asset('storage/' . $this->image_second_right);
    }
    public function getSecondLeftUrlAttribute()
    {
        if (!$this->image_second_left) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image_second_left, ['http://', 'https://'])) {
            return $this->image_second_left;
        }
        return asset('storage/' . $this->image_second_left);
    }
    public function getThirdUrlAttribute()
    {
        if (!$this->image_third) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image_third, ['http://', 'https://'])) {
            return $this->image_third;
        }
        return asset('storage/' . $this->image_third);
    }


    public static function checkSettings()
    {
        $settings = Self::all();
        if (count($settings) < 1) {
            $data = [
                'id' => 1,
            ];
            // foreach (config('app.languages') as $key => $value) {
            //     $data[$key]['title'] = $value;
            // }
            Self::create($data);
        }

        return Self::first();
    }
}
