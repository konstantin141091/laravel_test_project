<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
//    public $timestamps = false;
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'text', 'category_id'];

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }

    public static function rules($title) {
        $category = (new Categories())->getTable();
        return [
            'title' => 'required|min:5|max:40|unique:news,title,'.$title,
            'text' => 'required|min:10|max:4000',
            'category_id' => "required|exists:{$category},id"
        ];
    }

    public static function attributesName() {

        return [
            'category_id' => 'Категория новости',
            'text'        => 'Текст новости',
            'title'       => 'Заголовок новости'
        ];
    }
}
