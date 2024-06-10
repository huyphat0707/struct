<?php

namespace P7\StructCore\Core;

use Illuminate\Contracts\Foundation\Application;
use P7\StructCore\Contract\BaseRepositoryInterface;
use P7\StructCore\Exceptions\RepositoryException;

abstract class BaseService
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * @var $repository
     */
    protected $repository;

    abstract public function getRepository();

    /**
     * Constructor.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->resetRepository();
    }

    /**
     * Reset the repository instance.
     *
     * @throws string
     */
    public function resetRepository()
    {
        $instance = $this->app->make($this->getRepository());
        if (!$instance instanceof BaseRepositoryInterface) {
            throw RepositoryException::invalidModel();
        }
        $this->repository = $instance;
    }

    /**
     * Get all records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->all();
    }

    /**
     * Get record by ID.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById(int|string $id): \Illuminate\Database\Eloquent\Model
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new record.
     *
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        return $this->repository->create($attributes);
    }

    /**
     * Update a record by ID.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(int|string $id, array $attributes): \Illuminate\Database\Eloquent\Model
    {
        return $this->repository->update($id, $attributes);
    }

    /**
     * Delete a record by ID.
     *
     * @param int|string $id
     * @return bool
     */
    public function delete(int|string $id): bool
    {
        return $this->repository->delete($id);
    }
}
