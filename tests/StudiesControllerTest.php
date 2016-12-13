<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudiesControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndexNotLogged()
    {

        $this->get('studies');
        $this->assertRedirectedTo('login');

        // 1) Preparació
        // 2) Execució
        // 3) Assertions

    }

    public function testIndex()
    {
        $studies = factory(\Scool\enrollment_payments\Model\Study::class,50)->create();
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);
        $this->get('studies');
        $this->assertResponseOk();
        $this->assertViewHas('studies');

        $studies = $this->response->getOriginalContent()->getData()['studies'];
        dd($studies);

        // 1) Preparació
        // 2) Execució
        // 3) Assertions

    }

    public function testStore()
    {
        $this->post();
    }
}
