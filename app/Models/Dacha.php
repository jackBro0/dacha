<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dacha extends Model
{
    protected $guarded = [];
    protected $hidden = ['updated_at', 'deleted_at'];
    protected $casts = [
        'comforts_uz' => 'array',
        'comforts_ru' => 'array',
    ];
    use SoftDeletes;
    use HasFactory;

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id' );
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(DachaImage::class, 'dacha_id', 'id' );
    }
}
