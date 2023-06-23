<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    use HasFactory;
    protected $table = 'setting_translations';
    public $timestamps = false;
    protected $fillable = [
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
}
