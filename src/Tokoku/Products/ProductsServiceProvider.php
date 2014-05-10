<?php namespace Tokoku\Products;

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
		$app = $this->app;
		
		$this->app['product'] = $this->app->share(function($app)
		{
		    return new Product;
		});
		
		$app->bind(
            'Tokoku\Products\Repositories\ProductRepositoryInterface',
            'Tokoku\Products\Repositories\EloquentProductRepository'
        );

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
