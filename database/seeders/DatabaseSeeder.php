<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        $user->assignRole('super_admin');

        $this->call([
            Visitors::class,
            Testimonial::class,
            Subscribers::class,
            Services::class,
            Post::class,
            Number::class,
            Material::class,
            ContactMessages::class,
            Category::class,
            CaseStudy::class,
            CaseCategory::class,
            //CustomPage::class,
        ]);

        $case_categories = DB::table('case_categories')->get();
        $case_studies = DB::table('case_studies')->get();

        foreach ($case_categories as $case_category) {
            $case_studies->random(3)->each(function ($case_study) use ($case_category) {
                DB::table('case_category_case_study')->insert([
                    'case_category_id' => $case_category->id,
                    'case_study_id' => $case_study->id,
                ]);
            });
        }

        $categories = DB::table('categories')->get();
        $posts = DB::table('posts')->get();

        foreach ($categories as $category) {
            $posts->random(3)->each(function ($post) use ($category) {
                DB::table('category_post')->insert([
                    'category_id' => $category->id,
                    'post_id' => $post->id,
                ]);
            });
        }
    }
}
