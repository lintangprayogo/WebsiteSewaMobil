<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=["car_id","customer_id","total","available","rent_start_date","rent_end_date"];
}
