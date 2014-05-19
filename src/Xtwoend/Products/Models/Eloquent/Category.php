<?php namespace Xtwoend\Products\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Xtwoend\Products\Models\CategoryInterface;

class Category extends Model implements CategoryInterface 
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

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