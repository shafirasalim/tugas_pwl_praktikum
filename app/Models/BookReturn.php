<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $table = 'returns';
    protected $fillable = ['loan_detail_id', 'charge', 'amount'];
}