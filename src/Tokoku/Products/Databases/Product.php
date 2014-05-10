<?php namespace Tokoku\Products\Databases;

use Illuminate\Database\Eloquent\Model as LaravelEloquent;

class Product extends LaravelEloquent
{   
	
    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = array())
    {
        $this->setTable($this->getTable());

        parent::__construct($attributes);
    }
}

