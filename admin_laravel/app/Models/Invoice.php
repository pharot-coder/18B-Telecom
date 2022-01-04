<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $timestmap = false;
    protected $table = 'tblinvoice';
    protected $primaryKey = 'invoiceid';
}