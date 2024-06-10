<?php

namespace Acer\Asm2Ph35301\Controllers\Client;

use Acer\Asm2Ph35301\Commons\Controller;
use Acer\Asm2Ph35301\Commons\Helper;
use Acer\Asm2Ph35301\Models\Category;
use Acer\Asm2Ph35301\Models\Product;

class HomeController extends Controller
{
    private Product $product;
    private Category $category;
        
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }
    public function index()
    {
        $products = $this->product->all();
        

        $this->renderClient('home', [
            'products' => $products
        ]);
    }
    }

