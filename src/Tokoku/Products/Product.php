<?php namespace Tokoku\Products;

use Tokoku\Products\Repositories\ProductInterface;

class Product
{	
	protected $product;

	public $responce = array();

	public function __construct(ProductInterface $products)
	{	
		$this->product = $products;		
	}	

	public function find($id)
	{
		$product = $this->product->find($id);
		if($product){
			$this->responce['status']	= true;
			$this->responce['data']		= $product;		
		}else{
			$this->responce['message']	= 'Product Not Found!';
			$this->responce['status']	= false;
		}
		
		return $this->responce;
	}

	public function FunctionName($value='')
	{
		# code...
	}


}