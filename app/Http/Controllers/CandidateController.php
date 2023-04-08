<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateSaveRequest;
use App\Http\Resources\CandidateCollection;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use App\QueryBuilders\CandidateBuilder;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CandidateBuilder $query,)
    {
        return (new CandidateCollection($query->paginate()))
            ->additional(
                [
                    'status' => 200,
                    'message' => 'Data Has been successfully retrieved'
                ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateSaveRequest $request, Candidate $candidate)
    {

        $candidate->fill($request->only($candidate->offsetGet('fillable')))
            ->save();
        $candidate->skills()->sync($request->skill_ids);
        $candidate->fill(['created_by' => $candidate->id])
            ->save();
        $resource = (new CandidateResource($candidate))
            ->additional(
                [
                    'status' => 201,
                    'message' => 'Created'
                ]
            );
        return $resource->toResponse($request)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(CandidateBuilder $query, Candidate $candidate)
    {
        return (new CandidateResource($query->find($candidate->getKey())))->additional(
            [
                'status' => 200,
                'message' => 'Data Has been successfully retrieved'
            ]
        );
    }
}
