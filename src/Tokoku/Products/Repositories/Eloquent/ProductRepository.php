<?php namespace Tokoku\Products\Repositories\Eloquent;

use Tokoku\Products\Repositories\Eloquent\Product;
use Tokoku\Products\Repositories\ProductInterface;

class ProductRepository implements ProductInterface 
{   
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findOneBy(array $params = array())
    {   
        if(is_array($params)){
            foreach ($params as $key => $value) {
                $this->model->where($key,'=',$value);      
            }    
        }
        return $this->model->first();
    }

    public function findBy(array $params = array())
    {
        if(is_array($params)){
            foreach ($params as $key => $value) {
               $results =  $this->model->where($key,'=',$value);      
            }    
        }
        return $this->model->get(); 
    }

    public function create(array $input = array()){
        $this->model->fill($input);
        $this->model->save();

        return $this->model;
    }


    public function update($id, array $input = array()){

        $model = $this->model->find($id);
        $model->fill($input);
        $model->save();

        return $model;
    }

}