<?php namespace Tokoku\Products;

use Illuminate\Support\ServiceProvider;
use Tokoku\Products\Repositories\Eloquent\ProductRepository;
use Tokoku\Products\Repositories\Eloquent\Product as Model;

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
        $this->package('tokoku/products');

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
		$this->registerProduct();
		$this->bindInterface();
	}


	public function bindInterface()
	{
		$this->app->bind(
            'Tokoku\Products\Repositories\ProductInterface',
            'Tokoku\Products\Repositories\Eloquent\ProductRepository'
            //'Tokoku\Products\Categories\CategoryInterface',
            //'Tokoku\Products\Categories\Eloquent\Provider',
        );
	}

	/**
	 * Register the ProductInterface provider.
	 *
	 * @return void
	 */
	public function registerProductRepository()
	{
		$this->app['products.repository'] = $this->app->share(function($app){
			return new ProductRepository(new Model);
		});
	}


	public function registerProduct()
	{
		$this->app['product'] = $this->app->share(function($app)
		{
		    return new Product($app['products.repository']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('product');
	}

}
