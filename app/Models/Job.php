<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'modality',
        'city',
        'state',
        'type',
        'salary',
        'image',
        'description',
        'status',
        'address_id'
    ];

    public static array $rules = [
        'title' => 'required|string',
        'modality' => 'required|string',
        'type' => 'required|string',
        'status' => 'required|string',
        'salary' => 'nullable|string',
        'description' => 'nullable|string',
        'cep' => 'nullable|string',
        'neighborhood' => 'nullable|string',
        'street' => 'nullable|string',
        'state' => 'required|string',
        'city' => 'required|string',
        'number' => 'nullable|integer',
        'complement' => 'nullable|string',
        'addressId' => 'integer'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Addresses::class, 'address_id', 'id');
    }
}
