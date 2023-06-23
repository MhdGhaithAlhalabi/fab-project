<div class="container">
@if($errors->any())
<div class="alert alert-danger">
    <h3>حدث خطأ !</h3>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-header">
        <strong>ادخل بيانات تالصنف</strong>
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
                    <label>اسم الصنف - {{ $lang }}</label>
                    <input
                    type="text"
                    class="form-control"
                    name="{{$key}}[name]"
                    @if ($category->translate($key))
                    value="
                    {{$category->translate($key)->name}}
                    "
                    @endif

                    />
                </div>

                <div class="form-group col-md-12">
                    <label>الوصف</label>
                    <textarea
                    name="{{$key}}[description]"
                    class="form-control"
                    cols="30"
                    rows="10"
                    >
                    @if ($category->translate($key))
                    {{$category->translate($key)->description}}
                    @endif
                </textarea>
                </div>
            </div>
        @endforeach

    </div>



</div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-12">

    <div class="form-group">
        <label for="">اسم الصنف الاب</label>
        <select name="parent_id" class="form-control form-select">
            <option value="">صنف رئيسي</option>
            @foreach($parents as $parent)
            <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>{{ $parent->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">حالة</label>
        <div>
            <x-form.radio name="status" :checked="$category->status" :options="['active' => 'نشط', 'archived' => 'مؤرشف']" />
        </div>
    </div>

    </div>
    <div class="col-lg-4 col-md-4 col-12">
    <div class="form-group">
        <x-form.label id="image">صورة</x-form.label>
        <x-form.input type="file" name="image" accept="image/*" />
        @if ($category->image)
        <img src="{{ asset('storage/' . $category->image) }}" alt="" height="60">
        @endif
    </div>
    </div>
</div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'حفظ' }}</button>
    </div>
</div>
