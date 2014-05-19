<?php namespace Xtwoend\Products\Repositories;

use Xtwoend\Products\Repositories\ProductRepositoryInterface;
use Xtwoend\Products\Models\ProductInterface;
use Xtwoend\Products\ProductCreateException;


class ProductProvider implements ProductRepositoryInterface 
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
    public function __construct(ProductInterface $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function setModel(ProductInterface $model)
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
            throw new ProductCreateException("Could not create a new products");
        }

        return $this->model;
    }
	

    public function findById($id)
    {
        $model = $this->create($attributes = array());

        $product = $model->find($id);

        if ( ! $product )
        {
            throw new ProductNotFoundException("A product could not be found with ID [$id].");
        }

        return $product;
    }
}