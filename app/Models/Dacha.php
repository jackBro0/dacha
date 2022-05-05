<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Dacha extends Model
{
    protected $guarded = [];
    protected $hidden = ['updated_at', 'deleted_at'];
    use SoftDeletes, HasFactory;

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        Auth::user();
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(DachaImage::class, 'dacha_id', 'id');
    }

    public function comforts(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(Comfort::class, ComfortDacha::class,'dacha_id', 'comfort_id');
    }

    public static function initialDacha()
    {
        return [
            [
                'created_by' => 1,
                'name_uz' => 'Dacha #'.rand(111, 999),
                'name_ru' => 'Дача #'.rand(111, 999),
                'room_count' => 5,
                'bathroom_count' => 2,
                'capacity' => 8,
                'cost' => 8,
                'comforts_uz' => ["Bilyard", "Ps4", "Bolalar xonasi", "Qishki basseyn", "Yozgi Basseyn", "Sauna", "Karaoke"],
                'comforts_ru' => ["Бильярд", "Ps4", "Детская комната", "Внутренний бассейн", "Летний бассейн", "Сауна финская", "Караоке"]
            ],

            [
                'created_by' => 1,
                'name_uz' => 'Dacha #'.rand(111, 999),
                'name_ru' => 'Дача #'.rand(111, 999),
                'room_count' => 5,
                'bathroom_count' => 2,
                'capacity' => 8,
                'cost' => 8,
                'comforts_uz' => ["Bilyard", "Ps4", "Qishki basseyn", "Yozgi Basseyn", "Sauna", "Karaoke"],
                'comforts_ru' => ["Бильярд", "Ps4", "Внутренний бассейн", "Летний бассейн", "Сауна финская", "Караоке"]
            ],

            [
                'created_by' => 1,
                'name_uz' => 'Dacha #'.rand(111, 999),
                'name_ru' => 'Дача #'.rand(111, 999),
                'room_count' => 5,
                'bathroom_count' => 2,
                'capacity' => 8,
                'cost' => 8,
                'comforts_uz' => ["Yozgi Basseyn", "Sauna", "Karaoke"],
                'comforts_ru' => ["Летний бассейн", "Сауна финская", "Караоке"]
            ],

            [
                'created_by' => 1,
                'name_uz' => 'Dacha #'.rand(111, 999),
                'name_ru' => 'Дача #'.rand(111, 999),
                'room_count' => 5,
                'bathroom_count' => 2,
                'capacity' => 8,
                'cost' => 8,
                'comforts_uz' => ["Bilyard", "Ps4"],
                'comforts_ru' => ["Бильярд", "Ps4"]
            ]
        ];
    }
}
