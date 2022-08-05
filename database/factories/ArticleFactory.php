<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{

    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // фраза из 6 слов
        $title = $this->faker->sentence(6,true);

        //приводим $title к нижнему регистру, убираем точку в конце и все пробелы заменяем на - (тире)
        $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0, -1);

        return [
            'title' => $title,
            'body' => $this->faker->paragraph(100,true), //текст из 100 предложений
            'slug' => $slug,
            'img' => 'https://via.placeholder.com/600/F5550/FFFFFF/?text=ALEVUR',
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
