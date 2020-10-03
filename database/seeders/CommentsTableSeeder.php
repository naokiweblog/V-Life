<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'group_id' => '1',
            'content' => '参加したいです！',
        ];
        $comment = new Comment;
        $comment->fill($param)->save();

        $param = [
            'user_id' => '1',
            'group_id' => '1',
            'content' => 'いいですよ！',
        ];
        $comment = new Comment;
        $comment->fill($param)->save();

        $param = [
            'user_id' => '1',
            'group_id' => '1',
            'content' => '頑張ります！',
        ];
        $comment = new Comment;
        $comment->fill($param)->save();

        $param = [
            'user_id' => '1',
            'group_id' => '2',
            'content' => '参加したい！',
        ];
        $comment = new Comment;
        $comment->fill($param)->save();

        $param = [
            'user_id' => '1',
            'group_id' => '2',
            'content' => 'いいよ！',
        ];
        $comment = new Comment;
        $comment->fill($param)->save();

        $param = [
            'user_id' => '1',
            'group_id' => '2',
            'content' => '頑張る！',
        ];
        $comment = new Comment;
        $comment->fill($param)->save();
    }
}
