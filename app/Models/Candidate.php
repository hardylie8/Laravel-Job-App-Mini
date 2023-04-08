<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'created_by', 'updated_by', 'deleted_by', 'email', 'phone', 'year', 'job_id'
    ];

    /**
     * Get all of the candidate skills .
     * @return belongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_sets', 'candidate_id', 'skill_id',);
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }
}
