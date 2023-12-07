<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopStockholders extends Model
{
    use HasFactory;
    
    protected $table="top_100_stockholders";

    public $timestamps=false;
}
