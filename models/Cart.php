<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    /**
     * 
     * @param type $product id продукта
     * @param type $number количество товара
     * Добавить товар в корзину
     */
    public function addToCart($product, $number = 1)
    {
        if(isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['number'] += $number;
        } else {
            $_SESSION['cart'][$product->id] = [
                'number' => $number,
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
            ];
        }
        
        $_SESSION['cart-number'] = isset($_SESSION['cart-number']) 
                ? $_SESSION['cart-number'] + $number 
                : $number;
        $_SESSION['cart-amount'] = isset($_SESSION['cart-amount']) 
                ? $_SESSION['cart-amount'] + $number * $product->price 
                : $number * $product->price;    
    }
    /**
     * 
     * @param type $product id продукта
     * @return type
     * Убрать штуку товара из корзины
     */
    public function minusFromCart($product) 
    {
        if(isset($_SESSION['cart'][$product->id]['number'])) {
            $_SESSION['cart'][$product->id]['number']--; 
        } else {
            return;
        }   
        if($_SESSION['cart'][$product->id]['number'] <= 0) {
            unset($_SESSION['cart'][$product->id]);
        }

        $_SESSION['cart-number']--;
        $_SESSION['cart-amount'] = $_SESSION['cart-amount'] - $product->price;
        if($_SESSION['cart-number'] <= 0) {
            unset($_SESSION['cart']);
            unset($_SESSION['cart-number']);
        }
    }
    /**
     * 
     * @param type $product
     * Убрать товар из корзины
     */
    public function removeProductFromCart($product)
    {
        if(isset($_SESSION['cart'][$product->id]['number'])) {
            $_SESSION['cart-number'] -= $_SESSION['cart'][$product->id]['number'];
            $_SESSION['cart-amount'] = $_SESSION['cart-amount'] - $_SESSION['cart'][$product->id]['number'] * $product->price;
            if($_SESSION['cart-number'] <= 0) {
                unset($_SESSION['cart']);
                unset($_SESSION['cart-number']);
            }
            unset($_SESSION['cart'][$product->id]); 
        } 
    }
}