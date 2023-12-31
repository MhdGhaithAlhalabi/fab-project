<?php

namespace App\Models;

//use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule as ValidationRule;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;

    public $translatedAttributes =['name', 'description','details','features','specifications'];
    protected $fillable = [
        'slug', 'image', 'category_id',
        'price', 'compare_price', 'status',
        'popular','featured'
    ];
    // protected $fillable = [
    //     'name', 'slug', 'description', 'image', 'category_id', 'store_id',
    //     'price', 'compare_price', 'status',
    // ];

    protected $hidden = [
        'image',
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'image_url',
    ];
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class
        ,
        'products_attributes',  // Pivot table name
        'product_id',          // FK in pivot table for the current model
        'attribute_id',       // FK in pivot table for the related model
        'id',                 // PK current model
        //'id'
        )->withPivot(['values_ar','values_en','values_tr']);
    }

    public function variants(){

            return $this->hasMany(Variant::class);
    }

    protected static function booted()
    {
       // static::addGlobalScope('store', new StoreScope());

        static::creating(function(Product $product) {
            $product->slug = Str::slug($product->name);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }

    // public function store()
    // {
    //     return $this->belongsTo(Store::class, 'store_id', 'id');
    // }
    public static function rules($id = 0)
    {
        return RuleFactory::make([
            'ar.name' => [
                'required',
                'string',
                'min:3',
                'max:255',
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
                //"unique:category_translations,translations.%name%,$id",
                //ValidationRule::unique('category_translations', 'name')->ignore($id),
                // function($attribute, $value, $fails) {
                //     if (strtolower($value) == 'laravel') {
                //         $fails('This name is forbidden!');
                //     }
                // },
                //'filter:php,laravel,html',
                //new Filter(['php', 'laravel', 'html']),
            ],
            'image' => [
                'image', 'max:1048576', 'dimensions:min_width=100,min_height=100',
            ],
            'price' => [
                'required'
            ],

            'status' => 'required|in:active,archived',
        ]);
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,     // Related Model
            'product_tag',  // Pivot table name
            'product_id',   // FK in pivot table for the current model
            'tag_id',       // FK in pivot table for the related model
            'id',           // PK current model
            'id'            // PK related model
        );
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    // Accessors
    // $product->image_url
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

    public function getSalePercentAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }
        return round(100 - (100 * $this->price / $this->compare_price), 1);
    }

    public function scopeFilter(Builder $builder, $filters)
    {
        $builder->when($filters['name'] ?? false, function($builder, $value) {
            $builder->whereTranslationLike('name', "%{$value}%");
        });

        $builder->when($filters['status'] ?? false, function($builder, $value) {
            $builder->where('products.status', '=', $value);
        });
        // $options = array_merge([
        //     // 'store_id' => null,
        //     'category_id' => null,
        //     'tag_id' => null,
        //     'status' => 'active',
        // ], $filters);

        // $builder->when($options['status'], function ($query, $status) {
        //     return $query->where('status', $status);
        // });

        // $builder->when($options['store_id'], function($builder, $value) {
        //     $builder->where('store_id', $value);
        // });
        // $builder->when($options['category_id'], function($builder, $value) {
        //     $builder->where('category_id', $value);
        // });
        // $builder->when($options['tag_id'], function($builder, $value) {

        //     $builder->whereExists(function($query) use ($value) {
        //         $query->select(1)
        //             ->from('product_tag')
        //             ->whereRaw('product_id = products.id')
        //             ->where('tag_id', $value);
        //     });
            // $builder->whereRaw('id IN (SELECT product_id FROM product_tag WHERE tag_id = ?)', [$value]);
            // $builder->whereRaw('EXISTS (SELECT 1 FROM product_tag WHERE tag_id = ? AND product_id = products.id)', [$value]);

            // $builder->whereHas('tags', function($builder) use ($value) {
            //     $builder->where('id', $value);
            // });
       // });
    }
}
