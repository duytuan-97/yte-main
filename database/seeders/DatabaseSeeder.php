<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolesAndPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('123456789'),
        // ]);

        // $user_actions = [
        //     'view User', 'create User', 'update User', 'delete User',
        //     'view News', 'create News', 'update News', 'delete News',
        //     'view Product', 'create Product', 'update Product', 'delete Product',
        //     'view Product Type', 'create Product Type', 'update Product Type', 'delete Product Type',
        //     'view Permission', 'create Permission', 'update Permission', 'delete Permission',
        // ];


        // foreach ($user_actions as $action) {
        //     Permission::create([
        //         'name' => $action,
        //         'guard_name' => 'web'
        //     ]);
        // }

        // DB::table('model_has_permissions')->insert([
        //     ['permission_id' => '1', 'model_type' => 'App\Models\User', 'model_id' => '1'],
        //     ['permission_id' => '2', 'model_type' => 'App\Models\User', 'model_id' => '1'],
        //     ['permission_id' => '3', 'model_type' => 'App\Models\User', 'model_id' => '1'],
        //     ['permission_id' => '4', 'model_type' => 'App\Models\User', 'model_id' => '1'],
        //  ]);
        // thêm vào bảng mode_has_permission như sau
        // 1 App\Models\User 1
        // 2 App\Models\User 1
        // 3 App\Models\User 1
        // 4 App\Models\User 1

        $product_types = [
            [
                'name' => 'Viên uống hỗ trợ',
            ],
            [
                'name' => 'Viên uống cải thiện',
            ],
            [
                'name' => 'Dung dịch',
            ]
        ];
        foreach ($product_types as $product_type) {
            ProductType::create($product_type);
        }

        $products = [
            [
                'product_type_id' => '1',
                'first_name' => 'Viên uống cải thiện',
                'last_name' => 'Viêm Loét Dạ Dày DTSt',
                'description' => 'Mô tả ngắn Viêm Loét Dạ Dày DTSt',
                'content' => '<p style="text-align: center"><img src="http://yte.test/storage/media/product_images/b08bbba3-0d93-4d74-af75-4fbf82ef7b1d.png" width="1067" height="737"></p>',
                'price' => '480000',
                'purpose' => '<ul><li>Hỗ trợ giảm acid dịch vị, giúp bảo vệ niêm mạc, dạ dày.</li><li>Hỗ trợ cải thiện các triệu chứng và giảm nguy cơ viêm loét dạ dày - tá tràng.</li><li>Cải thiện tình trạng táo bón.</li></ul>',
                'use' => '<p>Mỗi lần uống&nbsp;<strong>5 - 10 viên,&nbsp;</strong>mỗi ngày uống&nbsp;<strong>1 lần&nbsp;</strong>vào lúc&nbsp;<strong>21 giờ cùng với nước ấm.</strong></p>',
                'drug_facts' => 'Người bị viêm loét dạ dày - tá tràng với các biểu hiện: ợ hơi, ợ chua, ợ nóng, đau thượng vị, đầy bụng, ăn không tiêu, trào ngược dạ dày thực quản. Người uống nhiều bia rựơu hoặc dùng thuốc gây hại cho dạ dày.',
                'images' => ["media/product_images/d4gdHuvkRFJJ4ki64QjrUVbmLZWzEv-metaRHVvY19EVFN0LnBuZw==-.png", "media/product_images/PHIbsnF8G7dha2hqIUaTB12J5QADM5-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVFN0LTA2LmpwZw==-.jpg", "media/product_images/5obOQLNpPhn8gMgByU2A6IGrZix6aV-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/VCQnRP8GxzmRQ6NFbsFVjnZd7pWmPY-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVFN0LTA2LmpwZw==-.jpg", "media/product_images/vstJFXEBMl57jYDEuV6ILRoDAqLtrl-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg"],
                'display' => '1',
            ],
            [
                'product_type_id' => '2',
                'first_name' => 'Viên uống hỗ trợ',
                'last_name' => 'Giảm suy nhược cơ thể BLSH',
                'description' => 'mô tả ngắn về viên uống hỗ trợ giảm suy nhược cơ thể BLSH',
                'content' => '<p></p><p style="text-align: center;"><img src="http://yte.test/storage/media/product_images/6fb035c9-e32c-44b4-9300-ebff3cff4517.png" width="1065" height="737"></p>',
                'price' => '480000',
                'purpose' => '<ul><li>Hỗ trợ tăng cường sức đề kháng</li><li>Hỗ trợ giảm suy nhược cơ thể, giảm mệt mỏi</li><li>Giúp tiêu hóa tốt</li></ul>',
                'use' => '<p>Liều dùng bình thường:&nbsp;<strong>2 viên/lần.</strong></p><p>Liều dùng trong các trường hợp điều trị đặc biệt:&nbsp;<strong>5 viên/lần.&nbsp;</strong>Mỗi ngày uống&nbsp;<strong>2 lần</strong> hoặc theo sự chỉ dẫn của bác sĩ</p>',
                'drug_facts' => 'Người sức đề kháng kém, suy nhược cơ thể, mệt mỏi, ăn kém.',
                'images' => ["media/product_images/OIyqzyuAuoA4MoqKFgLwIJA19C2Ubs-metaRHVvY19CTFNoLnBuZw==-.png", "media/product_images/YkiM2tZDC4DsKw9taGJ3ZBV2Uqzmqv-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9CTFNoLTA2LmpwZw==-.jpg", "media/product_images/CzJ15sCc4mw3SMHWuamyaRUoPnGTYo-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/eOkI9YzQBajWd0Pm1KPR6eSIRIQBs4-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9CTFNoLTA2LmpwZw==-.jpg", "media/product_images/jGJMhTNn8WcHgrj0lX4szcE5OFT70T-metaRHVvY19CTFNoLnBuZw==-.png"],
                'display' => '1',
            ],
            [
                'product_type_id' => '2',
                'first_name' => 'Viên uống hỗ trợ',
                'last_name' => 'Bổ Phế DTAs	Mô tả ngắn bổ phế DTAs',
                'description' => 'mô tả ngắn về viên uống hỗ trợ giảm suy nhược cơ thể BLSH',
                'content' => '<p style="text-align: center"><img src="http://yte.test/storage/media/product_images/3def5400-9ebe-4dfc-9cac-520f4c65119c.png" width="1037" height="758"></p>',
                'price' => '480000',
                'purpose' => '<ul><li>Tăng cường sức đề kháng</li><li>Giúp giảm ho, giảm đờm do viêm họng</li><li>Ngừa sốt do siêu vi đường hô hấp</li></ul>',
                'use' => '<p>Mỗi lần uống <strong>5 - 7 viên&nbsp;</strong>ngày uống&nbsp;<strong>2 lần.</strong></p><p><strong>Uống cùng với nước ấm.</strong></p>',
                'drug_facts' => 'Người bị ho khan, ho có đờm, đau họng do ho, do viêm họng, viêm phế quản, viêm đường hô hấp trên.',
                'images' => ["media/product_images/OqOJMczVgetGzSA8C58KZ4cKIe7Lc1-metaRHVvY19EVEFzLnBuZw==-.png", "media/product_images/rXg8LC9yd7u4FCp2cfGdwjdQWfWTYW-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/FAxZpEgJHPp1FKfXBBqFr1cQIlCdiS-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA3LmpwZw==-.jpg", "media/product_images/MgKfGwanIJcdGTd3UMSV0jhYW1Rn1w-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA2LmpwZw==-.jpg", "media/product_images/0GRRT2fRhCawF2nBZuI6LBgrPyv3ex-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg"],
                'display' => '1',
            ],
            [
                'product_type_id' => '2',
                'first_name' => 'Viên uống hỗ trợ',
                'last_name' => 'Nhuận Tràng DTCI',
                'description' => 'Mô tả ngắn Nhuận Tràng DTCI',
                'content' => '<p><img src="http://yte.test/storage/media/product_images/6cd39bcb-d12e-433c-a11d-8a2a1b344014.png" width="1112" height="706"></p>',
                'price' => '480000',
                'purpose' => '<ul><li>Hỗ trợ tăng cường tiêu hóa.</li><li>Giảm đầy bụng khó tiêu.</li><li>Hỗ trợ nhuận tràng.</li></ul>',
                'use' => '<p>Mỗi lần uống&nbsp;<strong>1 - 3 viên&nbsp;</strong>mỗi ngày uống&nbsp;<strong>1 lần&nbsp;</strong>vào lúc&nbsp;<strong>21h cùng với nước ấm</strong></p>',
                'drug_facts' => 'Người bị táo bón, đầy bụng, khó tiêu.',
                'images' => ["media/product_images/pfxzgzaeaAAMV92xMYAGzADkVkKqBK-metaRHVvY19EVENsLnBuZw==-.png", "media/product_images/h2NuQrF2f039Kp1kDg9gD8xde9AMT7-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVENsLTA2LmpwZw==-.jpg", "media/product_images/wM2eOZlqr6fktitfqZVdRAqOTcf0DF-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVENsLTA3LmpwZw==-.jpg", "media/product_images/FUnA1wTELjjLLhVxmVOfBlMEiPoD7F-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/QsjQIkJVANedh4hvlz1d9J3MsX5jya-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVENsLTA3LmpwZw==-.jpg", "media/product_images/UwvceaBlE9Lc4bQwIPKBgDF5mbcWis-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg"],
                'display' => '1',
            ],
            [
                'product_type_id' => '2',
                'first_name' => 'Viên uống hỗ trợ',
                'last_name' => 'Giải Độc Gan DTLv',
                'description' => 'Mô tả ngắn Giải Độc Gan DTLv',
                'content' => '<p style="text-align: center"><img src="http://yte.test/storage/media/product_images/94fe7a6e-c802-4003-838d-bb75c7482b9e.png" width="1055" height="745"></p>',
                'price' => '480000',
                'purpose' => '<ul><li>Giải độc cho gan.</li><li>Hỗ trợ loại bỏ các chất gây hại cho gan.</li><li>Phòng ngừa ung thư gan.</li><li>Ổn định huyết áp, đường huyết.</li></ul>',
                'use' => '<p>Mỗi lần uống&nbsp;<strong>3 - 6 viên,&nbsp;</strong>mỗi ngày uống&nbsp;<strong>1 lần&nbsp;</strong>vào lúc&nbsp;<strong>21 giờ, uống cùng nước ấm.</strong></p>',
                'drug_facts' => 'Người chức năng gan suy giảm do viêm gan, xơ gan với các biểu hiện mẫn ngứa. nỗi mề đay, mệt mỏi, vàng da, ăn uống khó tiêu, men gan cao. Người uống nhiều rựu bia, hóa chất có hại cho gan.',
                'images' => ["media/product_images/8XjdwN2K92NAWNuFpmaaCyZvZCuMRm-metaRHVvY19EVEx2LnBuZw==-.png", "media/product_images/LvOQNhuTYKgFsrL85Z6lp6vzqGZPsN-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEx2LTA1LmpwZw==-.jpg", "media/product_images/TDDqlCKEuLHcMv43wqGav3qCNpKH9H-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/gAJExn7EzZGcwR1oET3l7ydikx5e2t-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEx2LTA2LmpwZw==-.jpg", "media/product_images/6RQdC40n1O7QZZfq3pnEj9tlPekJaG-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg"],
                'display' => '1',
            ],
            [
                'product_type_id' => '3',
                'first_name' => 'Dung dịch',
                'last_name' => 'SULFIDE KHÁNG KHUẨN KHÁNG SIÊU VI',
                'description' => 'Mô tả ngắn SULFIDE KHÁNG KHUẨN KHÁNG SIÊU VI',
                'content' => '<p style="text-align: center"><img src="http://yte.test/storage/media/product_images/a6382c3e-c327-4486-8c9b-ac8796d3a15f.png" width="1112" height="706"></p>',
                'price' => '480000',
                'purpose' => '<p>công dụng</p>',
                'use' => '<p>cách dùng</p>',
                'drug_facts' => 'đối tượng sử dụng.',
                'images' => ["media/product_images/oHk6BCrafJleeTr0QjHmolqzP7ZCH3-metaRHVvY19TdWxmaWRlLnBuZw==-.png", "media/product_images/7rBF0Eqk7JoudAgwEpt2tzSqOWd6my-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/7JJhmaOWPYkZJeho386YcSIXnmtrvM-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/UTIOUu9HYqdwdDTCKw07tp5B3XmHFD-metaRHVvY19TdWxmaWRlLnBuZw==-.png"],
                'display' => '1',
            ],
            [
                'product_type_id' => '3',
                'first_name' => 'Dung dịch',
                'last_name' => 'SULFIDE VX XỊT MŨI',
                'description' => 'Mô tả ngắn SULFIDE VX XỊT MŨI',
                'content' => '<p style="text-align: center"><img src="http://yte.test/storage/media/product_images/1415c378-2fac-46ca-a79f-d894638dfaa0.png" width="1065" height="737"></p>',
                'price' => '480000',
                'purpose' => '<p>công dụng</p>',
                'use' => '<p>cách dùng</p>',
                'drug_facts' => 'đối tượng sử dụng.',
                'images' => ["media/product_images/pB5hTATMHwh0T6Z45mMQ3wHfnt4I30-metaRHVvY19TdWxmaWRlVlgucG5n-.png", "media/product_images/MC4hZWn0USAD0eJahfRLuWYybyB9wd-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg", "media/product_images/XkEMJ3uK5wWeY4cH91uJwMCpE3aDlc-metaRHVvY19TdWxmaWRlVlgucG5n-.png", "media/product_images/DKDGHm3ytqtBqP7NjomYjzkCffXEW4-metaTEhSX1dlYl9TdWJEdW9jX0RldGFpbF9EVEFzLTA1LmpwZw==-.jpg"],
                'display' => '1',
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }

        $news = [
            [
                'id' => '1',
                'name' => 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia',
                'description' => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore. ',
                'description_images' => 'media/news_images/news1.jpg',
                'content' => '<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><p></p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news1_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Nisi magni odit consequatur autem nulla dolorem',
                'description' => 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.',
                'description_images' => 'media/news_images/news2.jpg',
                'content' => '<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news2_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.',
                'description' => 'Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis. Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.',
                'description_images' => 'media/news_images/news3.jpg',
                'content' => '<p>Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><p></p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news3_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
            [
                'id' => '4',
                'name' => 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.',
                'description' => 'Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.',
                'description_images' => 'media/news_images/news4.jpg',
                'content' => '<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><p></p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news4_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
            [
                'id' => '5',
                'name' => 'Nihil blanditiis at in nihil autem',
                'description' => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore. ',
                'description_images' => 'media/news_images/news5.jpg',
                'content' => '<p>Similique neque nam consequuntur ad non. Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><p></p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news5_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
            [
                'id' => '6',
                'name' => 'Quidem autem et impedit',
                'description' => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore. ',
                'description_images' => 'media/news_images/news1.jpg',
                'content' => '<p>Similique neque nam consequuntur ad non. Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><p></p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news1_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
            [
                'id' => '7',
                'name' => 'Id quia et et ut maxime similique occaecati ut',
                'description' => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore. ',
                'description_images' => 'media/news_images/news3_1.jpg',
                'content' => '<p>Similique neque nam consequuntur ad non. Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><p></p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news3_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
            [
                'id' => '8',
                'name' => 'Laborum corporis quo dara net para',
                'description' => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore. ',
                'description_images' => 'media/news_images/news4_1.jpg',
                'content' => '<p>Similique neque nam consequuntur ad non. Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><p></p><h3>Et quae iure vel ut odit alias.</h3><p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src="http://yte.test/storage/media/news_images/news4_1.jpg" width="1024" height="768"></p><h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>',
                'display' => '1',
            ],
        ];
        foreach ($news as $item) {
            News::create($item);
        }
    }
}
