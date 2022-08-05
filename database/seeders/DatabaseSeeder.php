<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //создаем 10 тэгов
        $tags = Tag::factory(10)->create();

        //создаем 20 статей
        $articles = Article::factory(20)->create();

        //передаем в pluck название поля, проходит по всем элементам коллекции и сохраняет массив этих полей
        //сохраняем все айдишники всех тегов в массив
        $tags_id = $tags->pluck('id');

        //циклом проходим по коллекции статей для каждой статьи

        $articles->each(function ($article) use ($tags_id){
            //заполняем 3 случайными тэгами
            $article->tags()->attach($tags_id->random(3));
            //для каждой статьи создаем 3 комментария
            Comment::factory(3)->create([
                'article_id' => $article->id
            ]);

            //для каждой статьи создаем 1 элемент статистики
            State::factory(1)->create([
                'article_id' => $article->id
            ]);
        });
    }
}
