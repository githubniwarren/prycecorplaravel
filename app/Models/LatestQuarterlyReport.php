<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestQuarterlyReport extends Model
{
    use HasFactory;

    protected $table="latest_quarterly_report";

    public $timestamps=false;

}
