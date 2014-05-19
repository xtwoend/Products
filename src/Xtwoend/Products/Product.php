<?php namespace Xtwoend\Products;

use Xtwoend\Products\Repositories\ProductRepositoryInterface;
use Xtwoend\Products\Repositories\CategoryRepositoryInterface;
use Xtwoend\Products\Models\ProductInterface;

class Product 
{	
	protected $productRepository;

	protected $categoryRepository;

	/**
     * Cart.
     *
     * @var ProductInterface
     */
    protected $product;

    /**
     * Cart.
     *
     * @var CategoryInterface
     */
    protected $category;

	public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository 
    )
    {
        $this->productRepository     = $productRepository;
        $this->categoryRepository = $categoryRepository;
       
    }


	public function setProductRepository(ProductRepositoryInterface $productRepository)
	{
		$this->productRepository = $productRepository;
	}


	public function getProductRepository()
	{
		return $this->productRepository;
	}


	public function setCategoryRepository(CategoryRepositoryInterface $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}


	public function getCategoryRepository()
	{
		return $this->productcategoryRepositoryRepository;
	}	

	public function get($id)
	{
		if (null !== $this->product) {
            return $this->product;
        }

        if (null !== $id) {
            try {
                $this->product = $this->productRepository->findById($id);
            } catch (ProductNotFoundException $e) {
                throw new ProductNotFoundException($e->getMessage());
                
            }
        }

        return $this->product;
	}

	public function productByCategory(array $attributs)
	{

	}

	//end other
}