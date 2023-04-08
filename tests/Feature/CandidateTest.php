<?php

namespace Tests\Feature;

use App\Models\Candidate;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CandidateTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Current endpoint url which being tested.
     *
     * @var string
     */
    protected $endpoint = '/api/candidate/';

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

        $this->model = Candidate::factory()->create();
    }

    /** @test */
    public function index_endpoint_works_as_expected()
    {
        $this->getJson($this->endpoint)
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->model->getAttribute('name'),
                'email' => $this->model->getAttribute('email'),
                'phone' => $this->model->getAttribute('phone'),
                'year' => $this->model->getAttribute('year'),
                'created_by' => $this->model->getAttribute('created_by'),
                'updated_by' => $this->model->getAttribute('updated_by'),
                'deleted_by' => $this->model->getAttribute('deleted_by'),
                'job_id' => $this->model->getAttribute('job_id'),
            ]);
    }

    /** @test */
    public function show_endpoint_works_as_expected()
    {
        $this->getJson($this->endpoint . $this->model->getKey())
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->model->getAttribute('name'),
                'email' => $this->model->getAttribute('email'),
                'phone' => $this->model->getAttribute('phone'),
                'year' => $this->model->getAttribute('year'),
                'created_by' => $this->model->getAttribute('created_by'),
                'updated_by' => $this->model->getAttribute('updated_by'),
                'deleted_by' => $this->model->getAttribute('deleted_by'),
                'job_id' => $this->model->getAttribute('job_id'),
            ]);
    }


    /** @test */
    public function create_endpoint_works_as_expected()
    {
        $skill = Skill::factory()->create();
        // Submitted data
        $data = Candidate::factory()->raw();

        // The data which should be shown
        $seenData = $data;
        $data['skill_ids'] = $skill->id;

        $this->postJson($this->endpoint, $data)
            ->assertStatus(201)
            ->assertJsonFragment($seenData);
    }
}
