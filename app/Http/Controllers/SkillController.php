<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillCollection;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\QueryBuilders\SkillBuilder;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SkillBuilder $query)
    {
        return (new SkillCollection($query->paginate()))
            ->additional(
                [
                    'status' => 200,
                    'message' => 'Data Has been successfully retrieved'
                ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(SkillBuilder $query, Skill $skill)
    {
        return (new SkillResource($query->find($skill->getKey())))->additional(
            [
                'status' => 200,
                'message' => 'Data Has been successfully retrieved'
            ]
        );
    }
}
