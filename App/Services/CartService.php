<?php

namespace App\Services;

use App\Database\Models\Product as ProductModel;
use App\Library\Cart;
use App\Library\Product;
use App\Entities\ProductEntity;
use App\Services\CartActionsService;

class CartService
{

    private CartActionsService $cartActionsService;

    public function __construct() {
        $this->cartActionsService = new CartActionsService;
    }

    public function add()
    {
        if(isset($_GET['id'])) {

            $id = strip_tags($_GET['id']);

            $productInfo = ProductModel::where('id', $id);
            
            $productEntity = new ProductEntity;
            $productEntity->setId($productInfo->id);
            $productEntity->setName($productInfo->name);
            $productEntity->setPrice($productInfo->price);
            $productEntity->setSlug($productInfo->slug);
            $productEntity->setImage($productInfo->image);
            $productEntity->setQuantity(1);
        
            $this->cartActionsService->add($productEntity);
        }
    }

    public function update()
    {
        $slug = strip_tags($_POST['slug']);
        $quantity = strip_tags($_POST['quantity']);

        ($quantity <= 0) ?
            $this->cartActionsService->remove($slug) :
            $this->cartActionsService->update($slug, $quantity);
    }

    public function delete()
    {
        if(isset($_GET['slug'])) {
            $slug = strip_tags($_GET['slug']);

            $this->cartActionsService->remove($slug);
        }
    }
}
