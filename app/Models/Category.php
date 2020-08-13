<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'title'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules($title) {
        return [
            'title' => 'required|min:5|max:40|unique:categories,title,'.$title,
        ];
    }

    public static function attributesName() {

        return [
            'title'=> 'Название категории'
        ];
    }
}
