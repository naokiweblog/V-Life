<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
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
            'name' => '初心者募集',
            'day' => '2020-11-01T18:00',
            'pref_id' => '1',
            'image' => '',
            'content' => '初心者中心にバレーをするメンバーを募集します。',
        ];
        $group = new Group;
        $group->fill($param)->save();
        
        $param = [
            'user_id' => '1',
            'name' => '中級者募集',
            'day' => '2020-11-02T18:00',
            'pref_id' => '2',
            'image' => '',
            'content' => '中級者中心にバレーをするメンバーを募集します。',
        ];
        $group = new Group;
        $group->fill($param)->save();

        $param = [
            'user_id' => '1',
            'name' => '上級者募集',
            'day' => '2020-11-03T18:00',
            'pref_id' => '3',
            'image' => '',
            'content' => '上級者中心にバレーをするメンバーを募集します。',
        ];
        $group = new Group;
        $group->fill($param)->save();

    }
}
