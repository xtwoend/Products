<?php namespace Xtwoend\Products\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Xtwoend\Products\Models\ProductInterface;

class Product extends Model implements ProductInterface 
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'product';

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = array();

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = array();


	/**
	 * Returns the user's ID.
	 *
	 * @return  mixed
	 */
	public function getId()
	{
		return $this->getKey();
	}

}