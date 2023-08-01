<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // category_id, publishing_company_id, block_id, summary,shelf (số tầng), publishing_year, created_at, updatet_at)
    use HasFactory;
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'author_id',
     'category_id','publishing_company_id', 'block_id','summary','shelf','publishing_year'];
}
