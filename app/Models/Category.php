<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $guarded = [];
    protected $hidden = ['updated_at', 'deleted_at'];
    use SoftDeletes;

    use HasFactory;

    public function dacha()
    {
        return $this->hasMany(Dacha::class, 'category_id', 'id')->with('images');
    }

    public static function initialCategories()
    {
        return [
            [
                'name_uz' => 'Humson',
                'name_ru' => 'Хумсон',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/xumson.png',
            ],

            [
                'name_uz' => 'Nanay',
                'name_ru' => 'Нанай',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/nanay.png',
            ],

            [
                'name_uz' => 'Burchumulla',
                'name_ru' => 'Бурчумулла',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/burchumulla.png',
            ],

            [
                'name_uz' => 'Chorvoq',
                'name_ru' => 'Чарвак',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/chorvoq.png',
            ],

            [
                'name_uz' => 'Humson',
                'name_ru' => 'Хумсон',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/xumson.png',
            ],

            [
                'name_uz' => 'Nanay',
                'name_ru' => 'Нанай',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/nanay.png',
            ],

            [
                'name_uz' => 'Burchumulla',
                'name_ru' => 'Бурчумулла',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/burchumulla.png',
            ],

            [
                'name_uz' => 'Chorvoq',
                'name_ru' => 'Чарвак',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/chorvoq.png',
            ],

            [
                'name_uz' => 'Humson',
                'name_ru' => 'Хумсон',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/xumson.png',
            ],

            [
                'name_uz' => 'Nanay',
                'name_ru' => 'Нанай',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/nanay.png',
            ],

            [
                'name_uz' => 'Burchumulla',
                'name_ru' => 'Бурчумулла',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/burchumulla.png',
            ],

            [
                'name_uz' => 'Chorvoq',
                'name_ru' => 'Чарвак',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/chorvoq.png',
            ],

            [
                'name_uz' => 'Humson',
                'name_ru' => 'Хумсон',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/xumson.png',
            ],

            [
                'name_uz' => 'Nanay',
                'name_ru' => 'Нанай',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/nanay.png',
            ],

            [
                'name_uz' => 'Burchumulla',
                'name_ru' => 'Бурчумулла',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/burchumulla.png',
            ],

            [
                'name_uz' => 'Chorvoq',
                'name_ru' => 'Чарвак',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/chorvoq.png',
            ],

            [
                'name_uz' => 'Humson',
                'name_ru' => 'Хумсон',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/xumson.png',
            ],

            [
                'name_uz' => 'Nanay',
                'name_ru' => 'Нанай',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/nanay.png',
            ],

            [
                'name_uz' => 'Burchumulla',
                'name_ru' => 'Бурчумулла',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/burchumulla.png',
            ],

            [
                'name_uz' => 'Chorvoq',
                'name_ru' => 'Чарвак',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/chorvoq.png',
            ],

            [
                'name_uz' => 'Humson',
                'name_ru' => 'Хумсон',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/xumson.png',
            ],

            [
                'name_uz' => 'Nanay',
                'name_ru' => 'Нанай',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/nanay.png',
            ],

            [
                'name_uz' => 'Burchumulla',
                'name_ru' => 'Бурчумулла',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/burchumulla.png',
            ],

            [
                'name_uz' => 'Chorvoq',
                'name_ru' => 'Чарвак',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/chorvoq.png',
            ],

            [
                'name_uz' => 'Humson',
                'name_ru' => 'Хумсон',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/xumson.png',
            ],

            [
                'name_uz' => 'Nanay',
                'name_ru' => 'Нанай',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/nanay.png',
            ],

            [
                'name_uz' => 'Burchumulla',
                'name_ru' => 'Бурчумулла',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/burchumulla.png',
            ],

            [
                'name_uz' => 'Chorvoq',
                'name_ru' => 'Чарвак',
                'description_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                 Nunc, faucibus accumsan pulvinar ultrices eget. Lectus eu pellentesque sed et,
                  praesent amet arcu nisi dignissim. Id gravida viverra ultrices ornare pretium sapien,
                   tempus eget. Consectetur neque sit pulvinar elit risus, sed. Elementum cursus cras orci et.
                    Odio feugiat eu ac sed amet fames integer. Proin elit leo et lacinia gravida nec.
                     Tortor tellus pulvinar interdum mauris nec amet, sapien sollicitudin.
                      Est ac faucibus in non quis sapien facilisis proina.',
                'description_ru' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                 несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору
                  отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали
                   небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух
                    до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым
                     для визуально-слухового восприятия.',
                'image_path' => 'assets/img/location/chorvoq.png',
            ],
        ];
    }
}
