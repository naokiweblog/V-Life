<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed('UsersTableSeeder');
        $this->seed('GroupsTableSeeder');

        $this->Users = new User();
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }

    public function testGroup()
    {
        // index
        $response = $this->get('/');
        $response->assertStatus(200);

        // 未ログイン状態ではgroup@index以外が接続不可

        // show
        $response = $this->get('/group/1');
        $response->assertStatus(302);

        // create
        $response = $this->get('/group/create');
        $response->assertStatus(302);

        // store
        $response = $this->post('/group');
        $response->assertStatus(302);

        // edit
        $response = $this->get('/group/1/edit');
        $response->assertStatus(302);

        // update
        $response = $this->put('/group/1');
        $response->assertStatus(302);

        // destroy
        $response = $this->delete('/group/1');
        $response->assertStatus(302);

        // ログイン状態ではgroup@show,create,editが接続可

        // show
        $response = $this->actingAs(User::find(1))->get('/group/1');
        $response->assertStatus(200);

        // create
        $response = $this->actingAs(User::find(1))->get('/group/create');
        $response->assertStatus(200);

        // edit
        $response = $this->actingAs(User::find(1))->get('/group/1/edit');
        $response->assertStatus(200);
    }
}
