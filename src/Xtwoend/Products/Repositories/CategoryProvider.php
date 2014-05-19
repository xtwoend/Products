<?php namespace Xtwoend\Products\Repositories;

use Xtwoend\Products\Repositories\CategoryRepositoryInterface;
use Xtwoend\Products\Models\CategoryInterface;
use Xtwoend\Products\CategoryCreateException;


class CategoryProvider implements CategoryRepositoryInterface 
{

	/**
     * The model.
     *
     * @var CartInterface
     */
    protected $model;

    /**
     * Create a new Cart database repository.
     *
     * @param  CartInterface $model
     * @return void
     */
    public function __construct(CategoryInterface $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function setModel(CategoryInterface $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * {@inheritdoc}
     */
    public function create(Array $attributes)
    {
        $this->model = $this->model->newInstance($attributes);

        if ( ! $this->model->save()) {
            throw new CategoryCreateException("Could not create a new products");
        }

        return $this->model;
    }
	
}