<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $primaryKey = 'brandid';
    protected $table = 'tblbrand';
    public $timestamps = false;

    protected $fillable = [
        'images'
    ];
}