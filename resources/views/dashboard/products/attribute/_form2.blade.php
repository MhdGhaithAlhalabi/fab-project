    <div class="card">

        <div class="card-header">
            <strong>قيمة الخصائص</strong>
        </div>

        <div class="card-block">
            <ul class="nav nav-tabs" id="myTab" role="tablist">

                @foreach (config('app.languages') as $key => $lang)
                    <li class="nav-item">
                        <a class="nav-link @if ($loop->index == 0) active @endif" id="home-tab"
                            data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="home"
                            aria-selected="true">{{ $lang }}</a>
                    </li>
                @endforeach

            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach (config('app.languages') as $key => $lang)
                    <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                        id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                        <br>


                        <div class="form-group mt-3 col-md-12">
                            <label>الاسم - {{ $lang }}</label>
                            <table>
                                @foreach (App\Models\Attribute::all() as $attribute)
                                    <tr>
                                        <td><input {{ $attribute->value ? 'checked' : null }} data-id="{{ $key }}{{ $attribute->id }}" type="checkbox"
                                                class="ingredient-enable"></td>
                                        <td>{{ $attribute->name }}</td>
                                        <td>
                                            <input value="{{ $attribute->value ?? null }}" {{ $attribute->value ? null : 'disabled' }}
                                                data-id="{{ $key }}{{ $attribute->id }}" name="{{ $key }}[{{ $attribute->id }}]" type="text"
                                                class="ingredient-amount form-control" placeholder="values">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{-- <input type="text" name="{{ $key }}[name]" class="form-control"
                                placeholder="الاسم"> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'حفظ' }}</button>
</div>
@push('styles')
    <link href="{{ asset('css/tagify.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    @parent
    <script src="{{ asset('js/tagify.min.js') }}"></script>
    <script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
    <script>
        $('document').ready(function() {
            $('.ingredient-enable').on('click', function() {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.ingredient-amount[data-id="' + id + '"]').val(null)
                let inputElm = document.querySelector('.ingredient-amount[data-id="' + id + '"]')
                tagify = new Tagify(inputElm);
            })
        });
    </script>
@endpush
