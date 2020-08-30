<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParseResource extends Model
{
    protected $table = 'parse_resources';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'url'];

    public static function rules() {
        return [
            'name' => 'required|min:1|max:75',
            'url' => 'required|url',
        ];
    }

    public static function attributesName() {

        return [
            'name' => 'Название ресурса',
            'url'  => 'Адресс ресурса',
        ];
    }
}
