<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_tag extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "article_id",
        "tag_id",
    ];
}
