<?php namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use RuntimeException;


use App\Interfaces\BaseInterface;

abstract class BaseRepository implements BaseInterface
{
    /**
     * @var string
     */
    protected $modelName;

    /**
     * Order Options
     *
     * @var array
     */
    protected $orderOptions = [];

    /**
     * Default order by
     *
     * @var string
     */
    private $orderBy = 'name';

    /**
     * Default order direction
     *
     * @var string
     */
    private $orderDirection = 'asc';

    /**
     * Return all records
     *
     * @param string $orderBy
     * @param array $relations
     * @param array $parameters
     * @return mixed
     * @throws Exception
     */
    public function all($orderBy = 'id', array $relations = [], array $parameters = [], $keyword = null)
    {
        $instance = $this->getQueryBuilder();

        $this->parseOrder($orderBy);

        $this->applySearch($instance, $keyword);

        return $instance->with($relations)
            ->orderBy($this->getOrderBy(), $this->getOrderDirection())
            ->get();
    }

    /**
     * Return paginated items
     *
     * @param string $orderBy
     * @param array $relations
     * @param int $paginate
     * @param array $parameters
     * @return mixed
     * @throws Exception
     */
    public function paginate($orderBy = 'id', array $relations = [], $paginate = 10, array $parameters = [], string $keyword = null)
    {
        $instance = $this->getQueryBuilder();

        $this->parseOrder($orderBy);

        $this->applySearch($instance, $keyword);
        $this->applyFilters($instance, $parameters);


        return $instance->with($relations)
            ->orderBy($this->getOrderBy(), $this->getOrderDirection())
            ->paginate($paginate);
    }

    /**
     * Apply parameters, which can be extended in child classes for filtering.
     */
    protected function applySearch(Builder $instance, string $keyword = null): void
    {
        // Should be implemented in specific repositories.
    }

    /**
     * Apply parameters, which can be extended in child classes for filtering.
     */
    protected function applyFilters(Builder $instance, array $filters = []): void
    {
        // Should be implemented in specific repositories.
    }

    /**
     * Find a single record
     *
     * @param int $id
     * @param array $relations
     * @return mixed
     * @throws Exception
     */
    public function find($id, array $relations = [])
    {
        return $this->getQueryBuilder()->with($relations)->findOrFail($id);
    }

    /**
     * Create a new record
     *
     * @param array $data
     * @return mixed
     * @throws Exception
     */

    public function store(array $data)
    {
        $instance = $this->getNewInstance();

        return $this->executeSave($instance, $data);
    }


    /**
     * Update the model instance
     *
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function update($id, array $data)
    {
        $instance = $this->find($id);


        return $this->executeSave($instance, $data);
    }

    /**
     * Save the model
     *
     * @param mixed $instance
     * @param array $data
     * @return mixed
     */
    protected function executeSave($instance, array $data)
    {
        $instance->fill($data);
        $instance->save();

        return $instance;
    }

    /**
     * @inheritDoc
     */
    public function getModelName(): string
    {
        if (!$this->modelName) {
            throw new RuntimeException('Model has not been set in ' . get_called_class());
        }

        //dd($this->modelName);
        return $this->modelName;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getQueryBuilder(): Builder
    {
        return $this->getNewInstance()->newQuery();
    }

    /**
     * @inheritDoc
     */
    public function getNewInstance()
    {
        $model = $this->getModelName();

        return new $model;
    }
    /**
     * Parse the order by data
     *
     * @param string $orderBy
     * @return void
     */

    protected function parseOrder($orderBy): void
    {
        if (substr($orderBy, -3) === 'Asc') {
            $this->setOrderDirection('asc');
            $orderBy = substr_replace($orderBy, '', -3);
        } elseif (substr($orderBy, -4) === 'Desc') {
            $this->setOrderDirection('desc');
            $orderBy = substr_replace($orderBy, '', -4);
        }

        $this->setOrderBy($orderBy);
    }

    /**
     * Set the order by field
     *
     * @param string $orderBy
     * @return void
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    /**
     * Get the order by field
     *
     * @return string
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Set the order direction
     *
     * @param string $orderDirection
     * @return void
     */
    public function setOrderDirection($orderDirection)
    {
        $this->orderDirection = $orderDirection;
    }

    /**
     * Get the order direction
     *
     * @return string
     */
    public function getOrderDirection()
    {
        return $this->orderDirection;
    }

    /**
     * Set the tenant key when saving data
     *
     * @param array $data
     * @return void
     * @throws Exception If Tenant value is found in data.
     */    

}