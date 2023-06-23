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
<div class="form-group">
    <x-form.input label="اسم المستخدم" class="form-control-lg" name="username" :value="$admin->username" />
</div>
<div class="form-group">
    <x-form.input label="الاسم" class="form-control-lg" name="name" :value="$admin->name" />
</div>
<div class="form-group">
    <x-form.input label="الموبايل" class="form-control-lg" name="phone_number" :value="$admin->phone_number" />
</div>
<div class="form-group">
    <x-form.input label="البريد الالكتروني" type="email" name="email" :value="$admin->email" />
</div>
<div class="form-group">
    <x-form.input
                    label="كلمة السر"
                    :value="$admin->Password"
                    type="password"
                    name="password"
                    required />
</div>
<div class="form-group">
    <x-form.input
                    label="تأكيد كلمة السر"
                    :value="$admin->Password"
                    type="password"
                    name="password_confirmation"
                    required />
</div>



<fieldset>
    <legend>القواعد</legend>

    @foreach ($roles as $role)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" @isset($admin_roles) @checked(in_array($role->id, old('roles', $admin_roles))) @endisset>
        <label class="form-check-label">
            {{ $role->name }}
        </label>
    </div>
    @endforeach
</fieldset>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'حفظ' }}</button>
</div>
