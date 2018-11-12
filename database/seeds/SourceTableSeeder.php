<?php

use Illuminate\Database\Seeder;
use App\Source;

class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mangacan = new Source;
        $mangacan->id = 3;
        $mangacan->name = 'Mangacanblog';
        $mangacan->base_link = 'http://www.mangacanblog.com';
        $mangacan->index_link = '/daftar-komik-manga-bahasa-indonesia.html';
        $mangacan->save();

        $mangatail = new Source;
        $mangatail->id = 2;
        $mangatail->name = 'Mangatail';
        $mangatail->base_link = 'https://www.mangatail.me';
        $mangatail->index_link = '/directory';
        $mangatail->save();
    }
}
