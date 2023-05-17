<?php

namespace App\Http\Controllers;


use App\Models\Cupon;
use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;


class CartController extends Controller
{
    //
    private $product ,$cartProduct,$cupon;
    public function addToCart( Request $request, $id)
    {
        $this->product = Product::find($id);

        ShoppingCart::add( $this->product->id, $this->product->name, $request->qty,$this->product->selling_price, ['image' => $this->product->image,'category_name'=> $this->product->category->name,'brand_name'=> $this->product->brand->name]);
        return redirect('/show-cart');
    }
    public function show()
    {
//        return ShoppingCart::all();
        return view('website.cart.index',['cart_products'=> ShoppingCart::all()]);
    }
    public function remove($id)
    {
        ShoppingCart::remove($id);
        return back()->with('message','Cart item info remove successfully.');
    }
    public function update( Request $request,$id)
    {
        $this->cartProduct = ShoppingCart::get($id);
        $this->product = Product::find($this->cartProduct->id);
        if ($this->product->stock_amount >= $request->qty)
        {
            ShoppingCart::update($id, $request->qty);
            return back()->with('message','Cart item info update successfully.');

        }
        return back()->with('message','sorry...maximum update amount is '. $this->product->stock_amount);

    }
    public function applyCupon(Request $request)
    {
       
//      $this->cupon = Cupon::where('name',$request->coupon)->first();
//      if ($this->cupon)
//      {
//          $sum = 0;
//          foreach (ShoppingCart::all())
//      }
    }
}

