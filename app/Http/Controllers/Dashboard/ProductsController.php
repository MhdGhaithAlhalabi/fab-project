<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\ImportProducts;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-any', Product::class);
        $request = request();
        // $products = Product::with(['category', 'store'])->paginate();
        $products =
            Product::with(['category'])
            ->filter($request->query())
            ->paginate();

        // SELECT * FROM products
        // SELECT * FROM categories WHERE id IN (..)
        // SELECT * FROM stores WHERE id IN (..)

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create', Product::class);

        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
        $clean_data = $request->validate(Product::rules(), [
            // 'name.unique' => 'This name is already exists!'
        ]);
        //$data = $request->except('image','tags');
        // Request merge
        $request->merge([
            'slug' => Str::slug($request->tr['name'])
        ]);

        $data = $request->except('image', 'tags');
        $data['image'] = $this->uploadImgae($request);
        //$data['store_id'] = 1;
        $product = Product::create($data);
        $tags = json_decode($request->post('tags'));
        $tag_ids = [];
        $saved_tags = Tag::all();
        if ($tags) {
            foreach ($tags as $item) {
                $slug = Str::slug($item->value);
                $tag = $saved_tags->where('slug', $slug)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item->value,
                        'slug' => $slug,
                    ]);
                }
                $tag_ids[] = $tag->id;
            }
        }
        $product->tags()->sync($tag_ids);

        // return redirect()->route('dashboard.products.index')
        //     ->with('success', 'Product created');
        return redirect()->route('dashboard.products.createAttributes', [$product]);
        //->with('product', $product);
    }
    public function createAttributes(Product $product)
    {

        return view('dashboard.products.attribute.create')->with('product', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::findOrFail($id);
        $this->authorize('view', $product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $tags = implode(',', $product->tags()->pluck('name')->toArray());


        return view('dashboard.products.edit', compact('product', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
        $clean_data = $request->validate(Product::rules(), [
            // 'name.unique' => 'This name is already exists!'
        ]);
        //dd($request->all());
        $old_image = $product->image;

        $data = $request->except('image', 'tags');

        $new_image = $this->uploadImgae($request);
        if ($new_image) {
            $data['image'] = $new_image;
        }
        //dd($data);
        $product->update($data);

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }

        $product->update($data);


        $tags = json_decode($request->post('tags'));
        $tag_ids = [];

        $saved_tags = Tag::all();

        foreach ($tags as $item) {
            $slug = Str::slug($item->value);
            $tag = $saved_tags->where('slug', $slug)->first();
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $item->value,
                    'slug' => $slug,
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $product->tags()->sync($tag_ids);

        $data2 = $request->except(['_token', '_method', 'price', 'category_id', 'compare_price', 'tags', 'status']);

        //$data3 = Arr::except($data2,['ar'].['name'],['description'],['details'],['features'],['specifications']);
        //dd(collect($this->mapAttribute($data2['ar'],'ar'))->except(['name','description','details','features','specifications']));
        try {
            if (array_key_exists('ar', $data2)) {
                $product->attributes()->sync(collect($this->mapAttribute($data2['ar'], 'ar')->except(['name', 'description', 'details', 'features', 'specifications'])));
            }
            if (array_key_exists('en', $data2)) {
                $product->attributes()->sync(collect($this->mapAttribute($data2['en'], 'en')->except(['name', 'description', 'details', 'features', 'specifications'])));
            }
            if (array_key_exists('tr', $data2)) {
                $product->attributes()->sync(collect($this->mapAttribute($data2['tr'], 'tr')->except(['name', 'description', 'details', 'features', 'specifications'])));
            }
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect()->route('dashboard.products.index')
            ->with('success', 'تم تحديث المنتج');
    }
    public function streAttributes(Request $request, Product $product)
    {
        $data = $request->all();
        try {
            if (array_key_exists('ar', $data)) {
                $product->attributes()->sync(collect($this->mapAttribute($data['ar'], 'ar')));
            }
            if (array_key_exists('en', $data)) {
                $product->attributes()->sync(collect($this->mapAttribute($data['en'], 'en')));
            }
            if (array_key_exists('tr', $data)) {
                $product->attributes()->sync(collect($this->mapAttribute($data['tr'], 'tr')));
            }
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('dashboard.products.index')
            ->with('success', 'Product created');
    }
    private function mapAttribute($attribute, $lang)
    {
        //dd($attribute);
        return collect($attribute)->map(function ($i) use ($lang) {
            //dd($lang['ar']);
            return ['values_' . $lang => $i];
        });
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //Gate::authorize('categories.delete');

        //$category = Category::findOrFail($id);
        $product->delete();

        //Category::where('id', '=', $id)->delete();
        //Category::destroy($id);

        $this->authorize('delete', $product);

        return Redirect::route('dashboard.products.index')
            ->with('success', 'تم نقل المنتج الى سلة المحذوفات');
        // $product = Product::findOrFail($id);
    }
    public function trash()
    {
        $products = Product::onlyTrashed()->paginate();
        return view('dashboard.products.trash', compact('products'));
    }

    public function restore(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $this->authorize('restore', $product);

        $product->restore();

        return redirect()->route('dashboard.products.trash')
            ->with('succes', 'تم ارجاع المنتج');
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $this->authorize('force-delete', $product);

        $product->forceDelete();

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        return redirect()->route('dashboard.products.trash')
            ->with('succes', 'تم حذف هذا المنتج نهائياً');
    }

    protected function uploadImgae(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }

        $file = $request->file('image'); // UploadedFile Object

        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        return $path;
    }
}
