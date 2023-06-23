<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Product_Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Expectation;

class AttributeController extends Controller
{
    public function create()
    {
        $product = Session::get('product');
        return view('dashboard.products.attribute.create')->with('product',$product);
    }
    public function store(Request $request)
    {


        $product = Product::find($request->product_id);
        $data = $request->all();


        try{
            if(array_key_exists('ar',$data)){
            $product->attributes()->sync(collect($this->mapAttribute($data['ar'],'ar')));
                }
            if(array_key_exists('en',$data)){
            $product->attributes()->sync(collect($this->mapAttribute($data['en'],'en')));
                }
            if(array_key_exists('tr',$data)){
            $product->attributes()->sync(collect($this->mapAttribute($data['tr'],'tr')));
                }

            }
        catch(\Exception $e){
            dd($e);
            }
        return redirect()->route('dashboard.products.index')
            ->with('success', 'تم انشاء المنتج والخصائص بنجاح');
    }
    private function mapAttribute($attribute,$lang)
{
    //dd($attribute);
    return collect($attribute)->map(function ($i) use ($lang) {
        //dd($lang['ar']);
        return ['values_'.$lang => $i];
    });
}

    public function edit(){

    }
    public function update(Request $request){
        $product = Product::find($request->product_id);
        $data = $request->all();
        //dd($data);
        try{
            if(array_key_exists('ar',$data)){
                $product->attributes()->sync(collect($this->mapAttribute($data['ar'],'ar')));
            }
            if(array_key_exists('en',$data)){
                $product->attributes()->sync(collect($this->mapAttribute($data['en'],'en')));
            }
            if(array_key_exists('tr',$data)){
                $product->attributes()->sync(collect($this->mapAttribute($data['tr'],'tr')));
            }
        }
        catch(\Exception $e){
            dd($e);
        }
        return redirect()->route('dashboard.products.index')
            ->with('success', 'تم تعديل الخصائص');
    }
    public function destroy(){

    }
}
