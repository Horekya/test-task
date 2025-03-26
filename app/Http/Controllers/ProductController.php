<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(private readonly ProductRepositoryInterface $productRepository)
    {
    }
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection($this->productRepository->all());
    }
    public function store(Request $request): void
    {
        $newProduct = new Product();
        $newProduct->fill($request->all());
        $this->productRepository->store($newProduct);
    }
}
