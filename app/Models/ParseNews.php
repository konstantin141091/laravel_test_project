<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParseNews extends Model
{
    protected $table = 'parse_news';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'link', 'category', 'url_adress'];
}
