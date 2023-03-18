<?php

namespace Database\Seeders;

use App\Models\Post;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = DB::connection('data_dummy')->table('posts')->get();

        foreach ($posts as $post) {
            try {
                $row = Post::insert([
                    'code' => $post->code,
                    'prefix' => $post->prefix,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'preview' => $post->preview,
                    'content' => $post->content,
                    'image' => $post->image,
                    'caption' => $post->caption,
                    'tags' => $post->tags,
                    'counter' => $post->counter,
                    'type' => $post->type,
                    'status' => $post->status,
                    'category_id' => 1,
                    'created_by' => $post->created_by,
                    'updated_by' => $post->updated_by,
                    'published_at' => $post->published_at,
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at,
                    'source' => $post->source,
                ]);

                echo $post->title.' ✅'.PHP_EOL;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
