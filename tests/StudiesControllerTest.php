<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use scool\enrollment_payments\Repositories\StudyRepository;

class StudiesControllerTest extends TestCase
{
    use DatabaseMigrations;

    protected $repository;

    /**
     * StudiesControllerTest constructor.
     * @param $repository
     */
    public function __construct(StudyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function testIndexNotLogged()
    {

        $this->get('studies');
        $this->assertRedirectedTo('login');

        // 1) Preparació
        // 2) Execució
        // 3) Assertions

    }

    public function setUp()
    {
        $this->repository = Mockery::mock(StudyRepository::class);
//        dd("setup");
//        $this->login();
    }

    public function tearDown()
    {

    }

    public function createDummyStudies()
    {
        $studi1= new Study();
        $studi2= new Study();
        $studi3= new Study();

        $studies = [
            $studi1,
            $studi2,
            $studi3
        ];

        return collect($studies);
    }

    public function testIndex()
    {
//        $studies = factory(\Scool\enrollment_payments\Model\Study::class,50)->create();

        //Face 1: Preparació --> isolation/mocking
        $this->login();

        $this->repository->shouldReceive('all')->once()->andReturn(
            $this->createDummyStudies()
        );
        $this->repository->shouldReceive('pushCriteria')->once();

        $this->app->instance(StudyRepository::class, $this->repository);


        $user = factory(\App\User::class)->create();
        $this->actingAs($user);
        $this->get('studies');
        $this->assertResponseOk();
        $this->assertViewHas('studies');

        $studies = $this->response->getOriginalContent()->getData()['studies'];
//        dd($studies);

        $this->assertInfinite();
        // 1) Preparació
        // 2) Execució
        // 3) Assertions

    }

    public function testStore()
    {
        $this->login();
        $this->post();
        $this->assertRedirectedTo();
    }
}
