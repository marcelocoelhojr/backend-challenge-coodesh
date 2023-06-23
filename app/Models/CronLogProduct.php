<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronLogProduct extends Model
{
    use HasFactory;

    protected $table = 'cron_log_product';

    protected $fillable = [
        'cron_log_id',
        'product_id'
    ];
}

