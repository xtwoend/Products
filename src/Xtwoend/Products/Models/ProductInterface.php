<?php  namespace Xtwoend\Products\Models;



interface ProductInterface 
{	
	/**
     * Returns the cart's ID.
     *
     * @return mixed
     */
    public function getId();


	 /**
     * Create a new instance of the given model.
     *
     * @param  array  $attributes
     * @param  bool   $exists
     *
     * @return ProductInterface|static
     */
    public function newInstance($attributes = array(), $exists = false);


    /**
     * Save the model to the database.
     *
     * @param  array  $options
     *
     * @return bool
     */
    public function save(array $options = array());
}