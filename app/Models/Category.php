<?php

namespace App\Models;

use App\CreatedUpdatedByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @property int id
 * @property string uuid
 * @property string name
 */
class Category extends Model
{
    use HasFactory, CreatedUpdatedByTrait, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
