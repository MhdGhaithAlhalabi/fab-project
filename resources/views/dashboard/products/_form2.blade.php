
<div class="row">

        <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group" >
                <x-form.input label="السعر" name="price" />
            </div>
            <div class="form-group">
                <label for="">الاصناف</label>
                <select name="category_id" class="form-control form-select">
                    <option value="">صنف  رئيسي</option>
                    @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="col-lg-4 col-md-4 col-12">

            <div class="form-group">
                <x-form.input label="السعر القديم" name="compare_price"  />
            </div>
            <div class="form-group">
                <x-form.label id="image">صورة</x-form.label>
                <x-form.input type="file" name="image" accept="image/*" />
            </div>
        </div>


</div>

<div class="row">

        <div class="col-lg-4 col-md-4 col-12">


            <div class="form-group">
                <x-form.input label="Tags" name="tags"  />
            </div>

        </div>

        <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
                <label for="">الحالة</label>
                <div>
                    <x-form.radio name="status"  :options="['active' => 'مفعل', 'draft' => 'مسودة', 'archived' => 'مؤرشف']" />
                </div>
            </div>
        </div>

</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-12">
        <div class="form-group">
            <label for="">منتجات مميزة</label>
            <div>
                <x-form.radio name="featured"  :options="['1' => 'مميز', '0' => 'غير مميز']" />
            </div>
        </div>
        </div>
    <div class="col-lg-4 col-md-4 col-12">
        <div class="form-group">
            <label for="">منتجات مميزة</label>
            <div>
                <x-form.radio name="popular"  :options="['1' => 'رائج', '0' => 'غير رائج']" />
            </div>
        </div>
        </div>
    </div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'حفظ' }}</button>
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
    tagify = new Tagify (inputElm);
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
@endpush
