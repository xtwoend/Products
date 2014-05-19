<?php namespace Xtwoend\Products;

use Xtwoend\Products\Repositories\ProductProvider;
use Xtwoend\Products\Repositories\CategoryProvider;
use Xtwoend\Products\Product;


use Illuminate\Support\ServiceProvider;


class ProductsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('xtwoend/products');
		//load route products
		include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerProductRepository();
		$this->registerCategoryRepository();
		$this->registerProduct();
	}

	/**
	 * Register Product.
	 *
	 * @return void
	 */

	public function registerProductRepository()
	{
		$this->app['products.repository'] = $this->app->share(function($app)
        {
        	$driver     = $app['config']->get('contoh.driver');
            $model      = $app['config']->get('contoh.product.model');            
           	
           	switch ($driver)
            {
                case 'eloquent':
                    $class = '\\'.ltrim($model, '\\');

                    return new ProductProvider(new $class);
                    break;
            }

            throw new \InvalidArgumentException("Invalid Driver [$driver] chosen for Products.");

        });
	}


	/**
	 * Register Category.
	 *
	 * @return void
	 */

	public function registerCategoryRepository()
	{
		$this->app['category.repository'] = $this->app->share(function($app)
        {	
        	$driver     = $app['config']->get('contoh.driver');
            $model      = $app['config']->get('contoh.category.model');                     
           

           	switch ($driver)
            {
                case 'eloquent':
                    $class = '\\'.ltrim($model, '\\');

                    return new CategoryProvider(new $class);
                    break;
            }

           	throw new \InvalidArgumentException("Invalid Driver [$driver] chosen for Products.");
        });
	}

	public function registerProduct()
	{
		 $this->app['product'] = $this->app->share(function($app)
        {
            return new Product(
            	$app['products.repository'],
            	$app['category.repository']
            );
        });
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('product','products.repository','category.repository');
	}

}
