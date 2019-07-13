<?php

namespace App\Services;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Validator\Contracts\ValidatorInterface;

abstract class AbstractService
{
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    public function setRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;

        return $this;
    }

    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * @param array $attributes
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $attributes)
    {
        $this->validator->with($attributes)->passesOrFail();

        $attributes = $this->beforeCreate($attributes);

        $instance = $this->repository->create($attributes);

        return $instance;
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, array $attributes)
    {
        $this->validator->with($attributes)->passesOrFail();

        $attributes = $this->beforeUpdate($attributes);

        $instance = $this->repository->update($attributes, $id);

        return $instance;
    }

    protected function beforeCreate(array $attributes)
    {
        return $attributes;
    }

    protected function beforeUpdate(array $attributes)
    {
        return $attributes;
    }
}
