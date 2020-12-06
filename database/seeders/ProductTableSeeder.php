<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'image_path' => 'https://chubarov.if.ua/images/book_design_2.jpg?crc=502489758',
            'title' => 'Капитал',
            'description' => 'Главный труд немецкого экономиста Карла Маркса по политической экономии, содержащий критический анализ капитализма. Работа написана с применением диалектико-материалистического подхода, в том числе к историческим процессам.',
            'price' => 10
        ]);
        $product->save();

        $product = new Product([
            'image_path' => 'https://s1.livelib.ru/boocover/1000460355/200/24eb/boocover.jpg',
            'title' => 'Атлант расправил плечи',
            'description' => 'Роман-антиутопия американской писательницы, родившейся в Российской империи, Айн Рэнд, впервые опубликованный в 1957 году. Является четвёртым и последним романом Рэнд, а также самым длинным',
            'price' => 13
        ]);
        $product->save();

        $product = new Product([
            'image_path' => 'https://upload.wikimedia.org/wikipedia/ru/thumb/a/ac/Manga_Evangelion.jpg/230px-Manga_Evangelion.jpg',
            'title' => 'Евангелион',
            'description' => 'Манга Ёсиюки Садамото, изначально публикуемая по частям в журнале Shonen Ace и впоследствии издаваемая Kadokawa Shoten в виде отдельных томов.',
            'price' => 9
        ]);
        $product->save();

        $product = new Product([
            'image_path' => 'https://ridero.ru/blog/wp-content/uploads/2019/04/cover_7-724x1024.jpg',
            'title' => 'История ежиков',
            'description' => 'На небольшой поляне, в тихом, заброшенном уголке леса два маленьких ежонка Лизи и Тим не могли даже представить себе, что с ними случится такая удивительная история, когда они нашли странный, ни на что не похожий предмет.',
            'price' => 14
        ]);
        $product->save();

        $product = new Product([
            'image_path' => 'https://img4.labirint.ru/rc/21ce9bf7a7959a439bdbb28d3d2f8dc2/220x340/books53/521110/cover.jpg?1563884810',
            'title' => 'Зов ктулху',
            'description' => 'рассказ Г.Ф. Лавкрафта в жанре лавкрафтовских ужасов, написанный в 1926 году. В нём впервые появляется Ктулху — божество, которому поклоняются адепты жестокого культа.',
            'price' => 11
        ]);
        $product->save();
    }
}
