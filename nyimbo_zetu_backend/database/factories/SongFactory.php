<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'song_title' => $this->faker->sentence(3),
            'composer' => $this->faker->name(),
            'artist/group' => $this->faker->name(),
            'lyrics' => $this->faker->paragraph,
            'midi' => 'uploads/midis/' . $this->faker->word() . '.midi',
            'pdf' => 'uploads/pdfs/' . $this->faker->word() . '.pdf',
            'youtube_link' => $this->faker->url(),
            'slug' => $this->faker->slug(),
            'subcategory_id' => \App\Models\SubCategory::inRandomOrder()->first()->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
