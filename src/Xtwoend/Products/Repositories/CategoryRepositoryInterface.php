<?php namespace Xtwoend\Products\Repositories;



use Xtwoend\Products\Models\CategoryInterface;


interface CategoryRepositoryInterface 
{

	/**
     * Set the model
     *
     * @param  CartInterface $model
     *
     * @return void
     */
    public function setModel(CategoryInterface $model);

    /**
     * Get the model
     *
     * @return CartInterface
     */
    public function getModel();

    /**
     * Save a new model and return the instance.
     *
     * @param  Array $attributes
     * @param  integer $timeToLife
     *
     * @return CategoryInterface
     *
     */
    public function create(Array $attributes);
}