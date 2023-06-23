<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'time',
        'memory',
        'executed_at',
        'status_connection_database',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
