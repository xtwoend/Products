<?php namespace Tokoku\Products;

use Tokoku\Products\Databases\Product as ProductModel;

class Product extends ProductModel
{	
	/**
     * The table associated with the model.
     *
     * @var string
     */

	protected $table = 'product';
	

	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = array('id');

}