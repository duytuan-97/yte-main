<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Models\ProductType;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'display' => 'boolean',
        'images' => 'array',
    ];

    public function product_type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    // public function product_images(): HasMany
    // {
    //     return $this->hasMany(ProductImage::class);
    // }
}
