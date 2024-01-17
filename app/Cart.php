<?php
namespace App;

class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product, $id){ 
        $newProduct = ['quanty' => 0, 'price' => $product->sellprice, 'productInfo' => $product];
        if($this->products && array_key_exists($id, $this->products)){
            $newProduct = $this->products[$id];
        }
        $newProduct['quanty'] = isset($newProduct['quanty']) ? $newProduct['quanty'] + 1 : 1;
        $newProduct['price'] = $newProduct['quanty'] * $product->sellprice;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->sellprice;
        $this->totalQuanty++;
    }    

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function UpdateItemCart($id, $quanty){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->sellprice;

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];

    }
    
}


?>