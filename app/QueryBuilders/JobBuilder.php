<?php

namespace App\QueryBuilders;

use App\Models\Jobs;
use Spatie\QueryBuilder\QueryBuilder;

final class JobBuilder extends Builder
{
    /**
     * JobBuilder constructor.
     *
     * 
     */
    public function __construct()
    {
        $this->builder = QueryBuilder::for(Jobs::class)->allowedFilters(['name']);
    }
}
