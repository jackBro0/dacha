<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Dacha;
use App\Models\DachaImage;
use App\Models\RentDacha;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create(
            [
                'role_id' => User::role_admin,
                'name' => 'admin',
                'phone' => '123456789012',
//                'email' => 'admin@admin.admin',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//                'remember_token' => Str::random(10),
            ]
        );

        $categories = Category::initialCategories();
        $dacha = Dacha::initialDacha();
        $dachaOrder = RentDacha::initialOrder();

        foreach ($categories as $category) {
            $cat = Category::query()->create([
                'name_uz' => $category['name_uz'],
                'name_ru' => $category['name_ru'],
                'description_uz' => $category['description_uz'],
                'description_ru' => $category['description_ru'],
                'image_path' => $category['image_path'],
            ]);

            foreach ($dacha as $item) {
                $d = Dacha::query()->create([
                    'category_id' => $cat->id,
                    'created_by' => $item['created_by'],
                    'name' => $item['name_ru'],
                    'room_count' => $item['room_count'],
                    'bathroom_count' => $item['bathroom_count'],
                    'capacity' => $item['capacity'],
                    'cost' => $item['cost'],
//                    'comforts_uz' => $item['comforts_uz'],
//                    'comforts_ru' => $item['comforts_ru']
                ]);
                DachaImage::query()->create([
                    'dacha_id' => $d->id,
                    'image_path' => 'assets/img/dacha/dacha_'.rand(1, 3).'.png',
                ]);
            }
        }

        foreach ($dachaOrder as $order) {
            RentDacha::query()->create([
                'name' => $order['name'],
                'phone' => $order['phone'],
                'description' => $order['description'],
            ]);
        }
    }
}
