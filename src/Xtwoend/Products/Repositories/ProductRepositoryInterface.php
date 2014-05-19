<?php namespace Xtwoend\Products\Repositories;



use Xtwoend\Products\Models\ProductInterface;


interface ProductRepositoryInterface 
{

	/**
     * Set the model
     *
     * @param  CartInterface $model
     *
     * @return void
     */
    public function setModel(ProductInterface $model);

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
     * @return ProductInterface
     *
     */
    public function create(Array $attributes);


    public function findById($id);
}