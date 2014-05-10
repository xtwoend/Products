<?php namespace Tokoku\Products\Controllers;

use Illuminate\Container\Container;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Input;

use Tokoku\Products\Repositories\ProductRepositoryInterface;

class ProductsController extends Controller
{

	protected $product;

	public function __construct(
		ProductRepositoryInterface $product
	)
	{
		$this->product = $product;
	}


	public function index()
	{	
		return $this->product->all();
	}

	public function show($id)
	{
		return $this->product->find($id);
	}

	public function create()
	{
		# code...
	}

	public function store()
	{
		return $this->product->create(Input::all());
	}

	public function edit($id)
	{
		return $this->product->find($id);
	}

	public function update($id)
	{
		return $this->product->update($id, Input::all());
	}
	

	public function destoy($id)
	{
		return $this->product->delete($id);
	}
}