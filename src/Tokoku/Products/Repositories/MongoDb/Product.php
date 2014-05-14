<?php namespace Tokoku\Products\Repositoris\MongoDb;

/**
* 
*/
use Jenssegers\Mongodb\Model as MongoModel;

class Product extends MongoModel
{
	/* pilih koneksi untuk mongodb */
	protected $connection = 'mongodb';

	protected $collection = 'product';
	
}
