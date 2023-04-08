<?php

namespace App\QueryBuilders;

use App\Models\Jobs;
use App\Models\Skill;
use Spatie\QueryBuilder\QueryBuilder;

final class SkillBuilder extends Builder
{
    /**
     * SkillBuilder constructor.
     *
     * 
     */
    public function __construct()
    {
        $this->builder = QueryBuilder::for(Skill::class)->allowedFilters(['name']);
    }
}
