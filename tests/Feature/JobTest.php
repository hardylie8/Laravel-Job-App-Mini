<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Jobs;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JobTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Current endpoint url which being tested.
     *
     * @var string
     */
    protected $endpoint = '/api/job/';

    /**
     * Faker generator instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * The model which being tested.
     *
     * @var Jobs
     */
    protected $model;

    /**
     * Setup the test environment.
     *
     * return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->model = Jobs::factory()->create();
    }

    /** @test */
    public function index_endpoint_works_as_expected()
    {
        $this->getJson($this->endpoint)
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->model->getAttribute('name'),
                'created_by' => $this->model->getAttribute('created_by'),
                'updated_by' => $this->model->getAttribute('updated_by'),
                'deleted_by' => $this->model->getAttribute('deleted_by'),
            ]);
    }

    /** @test */
    public function show_endpoint_works_as_expected()
    {
        $this->getJson($this->endpoint . $this->model->getKey())
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->model->getAttribute('name'),
                'created_by' => $this->model->getAttribute('created_by'),
                'updated_by' => $this->model->getAttribute('updated_by'),
                'deleted_by' => $this->model->getAttribute('deleted_by'),
            ]);
    }
}
