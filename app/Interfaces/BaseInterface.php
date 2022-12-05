<?php

namespace App\Interfaces;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;

interface BaseInterface
{
    public function all($orderBy = 'id', array $relations = [], array $parameters = [], string $keyword = null);
    public function paginate($orderBy = 'id', array $relations = [], $paginate = 10, array $parameters = [], string $keyword = null);
    public function find($id, array $relations = []);
    public function store(array $data);
    public function update($id, array $data);
    public function getModelName(): string;
    public function getQueryBuilder(): Builder;
    public function getNewInstance();
    public function setOrderBy($orderBy);
    public function getOrderBy();
    public function setOrderDirection($orderDirection);
    public function getOrderDirection();
}
