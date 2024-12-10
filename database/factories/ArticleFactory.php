<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $body = fake()->text(500);
        $is_published = fake()->boolean();

        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'image' => 'articles/article-test.png',
            'excerpt' => \Illuminate\Support\Str::excerpt($body),
            'body' => $body,
            'is_published' => $is_published,
            'created_by' => rand(1, 10),
            'updated_by' => null,
            'published_by' => $is_published ? rand(1, 10) : null,
            'published_at' => $is_published ? date(
                'Y-m-d',
                strtotime(fake()->randomElement(['+', '-']) . mt_rand(0, 30) . ' days')
            ) : null
        ];
    }
}
