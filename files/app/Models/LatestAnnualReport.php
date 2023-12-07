<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestAnnualReport extends Model
{
    use HasFactory;

    protected $table="latest_annual_report";

    public $timestamps=false;
}
