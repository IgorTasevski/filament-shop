<?php

namespace App\Models;

use App\CreatedUpdatedByTrait;
use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Product
 * @package App\Models
 * @property int id
 * @property string uuid
 * @property string name
 * @property string description
 * @property float price
 * @property int category_id
 * @property Category category
 */
#[ObservedBy([ProductObserver::class])]
class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, CreatedUpdatedByTrait, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'price',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
