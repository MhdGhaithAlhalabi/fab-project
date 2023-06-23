<div class="container">
    @php
    $attr2 = [];
    $gh2 = [];
    $values22 = [];
    $attributes = App\Models\Attribute::all();
    $attributes_id = $attributes->pluck('id')->toArray();
    foreach ($product->attributes as $ff) {
    $attr2[] = $ff;
    }
    $values21 = collect($attr2);
    foreach ($values21 as $h) {
    $values22[] = $h->pivot->attribute_id;
    $gh2[] = $h;
    }
    $gh = collect($gh2);
    $values22_id = $values22;
@endphp
    <div class="card">
        <div class="card-header">
            <strong>ادخل بيانات المنتج</strong>
        </div>
    <div class="card-block">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach (config('app.languages') as $key => $lang)
                <li class="nav-item">
                    <a class="nav-link @if ($loop->index == 0) active @endif"
                        id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab"
                        aria-controls="home" aria-selected="true">{{ $lang }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            @foreach (config('app.languages') as $key => $lang)
                <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                    id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <div class="form-group mt-3 col-md-12">
                        <label>اسم المنتج - {{ $lang }}</label>
                        <input type="text" name="{{$key}}[name]" class="form-control"
                            placeholder="الاسم" value="{{$product->translate($key)->name}}">
                    </div>

                    <div class="form-group col-md-12">
                        <label>الوصف</label>
                        <textarea name="{{$key}}[description]" class="form-control" cols="30" rows="10">{{$product->translate($key)->description}}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>وصف طويل - {{ $lang }}</label>
                        <textarea name="{{ $key }}[details]" class="form-control" cols="30" rows="10">{{$product->translate($key)->details}}</textarea>
                    </div>
                    <div class="form-group mt-3 col-md-12">
                        <label>خصائص - {{ $lang }}</label>
                        <input type="text"
                         name="{{ $key }}[features]" class="form-control"
                         value="{{ $product->translate($key)->features }}"
                            placeholder="خصائص">
                    </div>
                    <div class="form-group mt-3 col-md-12">
                        <label>مواصفات - {{ $lang }}</label>
                        <input type="text"
                        name="{{ $key }}[specifications]"
                        value="{{ $product->translate($key)->specifications }}"
                        class="form-control"
                            placeholder="مواصفات">
                    </div>


                @foreach (App\Models\Attribute::all() as $attribute2)
                    @if (!in_array($attribute2->id, $values22_id))
                    <div class="form-group mt-3 col-md-12">
                        <input
                        data-id="{{ $key }}{{ $attribute2->id }}"
                        type="checkbox"
                        class="ingredient-enable">
                        {{ $attribute2->translate('ar')->name }}- {{ $lang }}

                        <input
                        value="{{ $attribute2->value  ?? null }}"
                        data-id="{{ $key }}{{ $attribute2->id }}"
                        name="{{ $key }}[{{ $attribute2->id }}]"
                        type="text"
                        class="ingredient-amount form-control"
                        placeholder="values">
                    </div>
                    @else
                    @php
                        $values = [];
                        foreach ($product->attributes as $att) {
                        if ($att->pivot->attribute_id == $attribute2->id) {
                        $values_ar = $att->pivot->values_ar;
                        $values_en = $att->pivot->values_en;
                        $values_tr = $att->pivot->values_tr;
                        }
                        }
                        $values_ar = collect($values_ar);
                        $values_ar = implode(',', $values_ar->toArray());
                        $values_en = collect($values_en);
                        $values_en = implode(',', $values_en->toArray());
                        $values_tr = collect($values_tr);
                        $values_tr = implode(',', $values_tr->toArray());
                    @endphp
                    <div class="form-group mt-3 col-md-12">
                        <input
                        data-id="{{ $key }}{{ $attribute2->id }}"
                        type="checkbox"
                        class="ingredient-enable">
                        {{ $attribute2->translate('ar')->name }} - {{ $lang }}
                        <input
                        value="@if ($lang == 'العربية') {{ $values_ar  }} @elseif ($lang == 'English') {{ $values_en }}  @elseif ($lang == 'Türkçe') {{ $values_tr }} @endif"
                        data-id="{{ $key }}{{ $attribute2->id }}"
                        name="{{ $key }}[{{ $attribute2->id }}]"
                        type="text"
                        class="ingredient-amount form-control"
                        placeholder="values">
                    </div>
                    @endif
                @endforeach
            </div>
            @endforeach

        </div>



    </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-12">

            <div class="form-group">
                <x-form.input label="السعر" name="price" :value="$product->price" />
            </div>
            <div class="form-group">
                <label for="">الاصناف</label>
                <select name="category_id" class="form-control form-select">
                    <option value="">صنف رئيسي</option>
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">

            <div class="form-group">
                <x-form.input label="السعر القديم" name="compare_price" :value="$product->compare_price" />
            </div>
            <div class="form-group">
                <x-form.label id="image">الصورة</x-form.label>
                <x-form.input type="file" name="image" accept="image/*" />
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" height="60">
                @endif
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
                <x-form.input label="Tags" name="tags" :value="$tags" />
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
                <label for="">الحالة</label>
                <div>
                    <x-form.radio name="status" :checked="$product->status" :options="['active' => 'مفعل', 'draft' => 'مسودة', 'archived' => 'مؤرشف']" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
                <label for="">منتجات مميزة</label>
                <div>
                    <x-form.radio name="featured" :checked="$product->featured"  :options="['1' => 'مميز', '0' => 'غير مميز']" />
                </div>
            </div>
            </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
                <label for="">منتجات مميزة</label>
                <div>
                    <x-form.radio name="popular" :checked="$product->popular"  :options="['1' => 'رائج', '0' => 'غير رائج']" />
                </div>
            </div>
            </div>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'الحفظ' }}</button>
    </div>
</div>

@push('styles')
    <link href="{{ asset('css/tagify.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{ asset('js/tagify.min.js') }}"></script>
    <script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
    <script>
        var inputElm = document.querySelector('[name=tags]'),
            tagify = new Tagify(inputElm);
    </script>
    <script>
        var ar_specifications = document.querySelector("[name='ar[specifications]']"),
        tagify = new Tagify (ar_specifications);
    </script>
    <script>
        var en_specifications = document.querySelector("[name='en[specifications]']"),
        tagify = new Tagify (en_specifications);
    </script>
    <script>
        var tr_specifications = document.querySelector("[name='tr[specifications]']"),
        tagify = new Tagify (tr_specifications);
    </script>
    <script>
        var ar_features = document.querySelector("[name='ar[features]']"),
        tagify = new Tagify (ar_features);
    </script>
    <script>
        var en_features = document.querySelector("[name='en[features]']"),
        tagify = new Tagify (en_features);
    </script>
    <script>
        var tr_features = document.querySelector("[name='tr[features]']"),
        tagify = new Tagify (tr_features);
    </script>
     <script>
        $('document').ready(function() {
            var tt = @json($product->attributes);
            // for (let index = 0; index < tt.length; index++) {
                $('.ingredient-enable').on('click', function() {
                    let id = $(this).attr('data-id');
                    let enabled = $(this).is(":checked");
                    $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled);
                    if (!enabled) {
                        $('.ingredient-amount[data-id="' + id + '"]').val(null);
                    }
                    let inputElm2 = document.querySelector('.ingredient-amount[data-id="' + id + '"]');
                    tagify2 = new Tagify(inputElm2);
                });
            //}
        });
    </script>
@endpush
