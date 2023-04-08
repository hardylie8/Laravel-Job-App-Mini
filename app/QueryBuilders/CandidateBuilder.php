<?php

namespace App\QueryBuilders;

use App\Models\Candidate;
use App\Models\Jobs;
use Spatie\QueryBuilder\QueryBuilder;

final class CandidateBuilder extends Builder
{
    /**
     * CandidateBuilder constructor.
     *
     */
    public function __construct()
    {
        $this->builder = QueryBuilder::for(Candidate::class);
    }

    /**
     * Get default query builder.
     *
     * @return QueryBuilder
     */
    public function query(): QueryBuilder
    {
        return $this->getBuilder()->allowedIncludes(['skills', 'job']);
    }
}
