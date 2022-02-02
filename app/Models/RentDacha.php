<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentDacha extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public static function initialOrder()
    {
        return [
            [
                'name' => 'Sardor Azimov',
                'phone' => '99 123 32 12',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Azim Sardorov',
                'phone' => '90 321 32 13',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Salim',
                'phone' => '998933213213',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Karim',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Dilshod Rahimov',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Sardor Azimov',
                'phone' => '99 123 32 12',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Azim Sardorov',
                'phone' => '90 321 32 13',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Salim',
                'phone' => '998933213213',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Karim',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Dilshod Rahimov',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Sardor Azimov',
                'phone' => '99 123 32 12',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Azim Sardorov',
                'phone' => '90 321 32 13',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Salim',
                'phone' => '998933213213',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Karim',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Dilshod Rahimov',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Sardor Azimov',
                'phone' => '99 123 32 12',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Azim Sardorov',
                'phone' => '90 321 32 13',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Salim',
                'phone' => '998933213213',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Karim',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
            [
                'name' => 'Dilshod Rahimov',
                'phone' => '+998933213212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim.',
            ],
        ];
    }
}
