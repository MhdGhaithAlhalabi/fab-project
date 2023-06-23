<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = [
        'parent_id', 'image', 'status', 'slug'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')
            ->withDefault([
                'name' => '-'
            ]);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    public function scopeFilter(Builder $builder, $filters)
    {

        $builder->when($filters['name'] ?? false, function($builder, $value) {
            $builder->whereTranslationLike('name', "%{$value}%");
        });

        $builder->when($filters['status'] ?? false, function($builder, $value) {
            $builder->where('categories.status', '=', $value);
        });

    }
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
    public static function rules($id = 0)
    {
        return [

            'ar.name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                // "unique:categories,name,$id",
                //Rule::unique('categories', 'name')->ignore($id),
                // function($attribute, $value, $fails) {
                //     if (strtolower($value) == 'laravel') {
                //         $fails('This name is forbidden!');
                //     }
                // },
                //'filter:php,laravel,html',
                //new Filter(['php', 'laravel', 'html']),
            ],
            'en.name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'tr.name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'parent_id' => [
                'nullable', 'int', 'exists:categories,id'
            ],
            'image' => [
                'image', 'max:1048576', 'dimensions:min_width=100,min_height=100',
            ],
            // 'price' => [
            //     'required'
            // ],
            'status' => 'required|in:active,archived',

        ];
    }

}
