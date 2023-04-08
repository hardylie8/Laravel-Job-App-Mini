<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder as BaseBuilder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

abstract class Builder
{

    /**
     * The Query Builder instance
     *
     * @var QueryBuilder
     */
    protected $builder;

    /**
     * Current HTTP Request object.
     *
     * @var Request
     */
    protected $request;


    /**
     * Find record based on the given id number.
     *
     * @param int $key
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return mixed
     */
    public function find(int $key)
    {
        return $this->query()->findOrFail($key);
    }

    /**
     * Get the paginated results of current API get request.
     *
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->query()->jsonPaginate();
    }


    /**
     * Get default query builder.
     *
     * @return QueryBuilder
     */
    public function query(): QueryBuilder
    {
        return $this->getBuilder();
    }


    /**
     * get builder
     *
     * @return QueryBuilder
     */
    public function getBuilder()
    {
        return $this->builder;
    }
}
