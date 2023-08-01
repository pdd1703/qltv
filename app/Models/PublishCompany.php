<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishCompany extends Model
{
    // (id, company_code, company_name, created_at, updated_at)
    use HasFactory;
    protected $table = 'publish_company';
    protected $fillable = ['company_code', 'company_name'];
}
