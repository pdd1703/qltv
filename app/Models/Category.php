<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Category (id, category_code, category_name, created_at, updated_at)
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'category_code',
        'category_name',];
}
    