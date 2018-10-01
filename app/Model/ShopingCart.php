<?php

namespace App\Model;

use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\CartItem;
use App\Model\Product;
use Illuminate\Support\Collection;
class ShopingCart extends Cart
{
    public function show(){
    	return "shopping cart";
    }

     public function addToCart(array $product, int $int, $options = []) : CartItem{

        return $this->add($product["id"],$product["name"], $int, $product["price"], $options);

    }
     public function getCartItems() : Collection{
        return $this->content();
    }

    /**
     * @param $id
     */
    public function removeToCart(string $id){
         $this->remove($id);
    }

     /**
     * Count the items in the cart
     *
     * @return int
     */
    public function countItems() : int{
        return $this->count();
    }


     /**
     * Get the sub total of all the items in the cart
     *
     * @param int $decimals
     * @return float
     */
     public function getSubTotal(int $decimals = 2){
        return $this->subtotal($decimals, '.', '');
    }

    /**
     * Get the final total of all the items in the cart minus tax
     *
     * @param int $decimals
     * @param float $shipping
     * @return float
     */
    public function getTotal(int $decimals = 2, $shipping = 0.00)
    {
        return $this->total($decimals, '.', '', $shipping);
    }

      /**
     * Get the total price of the items in the cart.
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeparator
     * @param float $shipping
     * @return string
     */
    public function total($decimals = 2, $decimalPoint = '.', $thousandSeparator = null, $shipping = 0.00)
    {
        $content = $this->getContent();
        $total = $content->reduce(function ($total, CartItem $cartItem) {
            return $total + ($cartItem->qty * $cartItem->price);
        }, 0);
        $grandTotal = $total + $shipping;
        return number_format($grandTotal, $decimals, $decimalPoint, $thousandSeparator);
    }

    public function clearCart(){
        $this->destroy();
    }

}
