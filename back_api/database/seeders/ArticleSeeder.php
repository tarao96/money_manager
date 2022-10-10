<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'url' => 'https://www.rakuten-card.co.jp/minna-money/topic/article_2103_00024/',
            'img' => 'https://gyazo.com/f396568cbedcbf0072a609a786eefd8c',
            'title' => '絶対やった方がいい節約術10選！逆にやってはいけない節約術も？！',
            'body' => '家計のために節約を頑張っている主婦の方は多いはず。今回は、無理なく続けられて、いつのまにかお金が貯まるおすすめの節約術を紹介します。'
        ]);

        Article::create([
            'url' => 'https://www.o-uccino.jp/article/posts/56886',
            'img' => 'https://gyazo.com/f396568cbedcbf0072a609a786eefd8c',
            'title' => '【最新版】お金持ち1000人の「本当に効いた！節約術ランキング」ベスト15発表',
            'body' => 'これまでヨムーノで紹介したお金の節約記事のなかから、お金を貯めている人たちがこぞって「節約効果が絶大だった」と証言する、一押しの節約術 ...'
        ]);

        Article::create([
            'url' => 'https://www.kao.co.jp/lifei/support/75/',
            'img' => 'https://gyazo.com/f396568cbedcbf0072a609a786eefd8c',
            'title' => '知らないと損する節約術！７つの心得と見直しポイント',
            'body' => '節約は、「生きたお金の使い方」をするための手段 · ストレスのたまらない方法で、継続できる節約を · 【実践編】理想の節約生活の始め方 · 【費目別】家計の見直しポイント.'
        ]);
    }
}
