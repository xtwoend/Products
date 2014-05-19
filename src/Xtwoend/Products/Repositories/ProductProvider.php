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
    public function createModel(Array $attributes)
    {
        $this->model = $this->model->newInstance($attributes);

        if ( ! $this->model->save()) {
            throw new ProductCreateException("Could not create a new products");
        }

        return $this->model;
    }
	

    public function findById($id)
    {
        $model = $this->getModel();

        $product = $model->find($id);

        if ( ! $product )
        {
            throw new ProductNotFoundException("A product could not be found with ID [$id].");
        }

        return $product;
    }


    public function findBy(array $data)
    {
        $model = $this->getModel();

        if(is_array($data)){

            foreach ($data as $attribut => $value) {
                $model = $model->where($attribut, '=', $value );
            }
        }

        if(! $model->get()){
            throw new ProductNotFoundException("A Products could not be found ");
            
        }

        return $model->get();
    }
}