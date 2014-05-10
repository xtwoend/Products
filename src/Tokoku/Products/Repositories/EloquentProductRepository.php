<?php namespace Tokoku\Products\Repositories;

use Tokoku\Products\Product;

class EloquentProductRepository implements ProductRepositoryInterface {

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function find($id)
    {
        return $this->product->find($id);
    }

    public function findOrFail($id)
    {
        return $this->product->findOrFail($id);
    }

    public function all()
    {
        return $this->product->all();
    }

    public function findOneBy(array $params = array())
    {   
        if(is_array($params)){
            foreach ($params as $key => $value) {
                $this->product->where($key,'=',$value);      
            }    
        }
        return $this->product->first();
    }

    public function findBy(array $params = array())
    {
        if(is_array($params)){
            foreach ($params as $key => $value) {
                $this->product->where($key,'=',$value);      
            }    
        }
        return $this->product->get(); 
    }

    public function create(array $input = array()){
        $this->product->fill($input);
        $this->product->save();

        return $this->product;
    }


    public function update($id, array $input = array()){

        $product = $this->product->find($id);
        $product->fill($input);
        $product->save();

        return $product;
    }
}