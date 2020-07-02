<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use SweetAlert;
use Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data['items'] = Cart::getContent();
        return view('front.carts',$data);
    }
    
    public function store(Request $request)
    {
        $product = Product::find($request->product);
        $row_id = rand ( 0,1000000000 ); //generate row id
        $user_id = 1; //generate user id

        if(!empty($product->meta->sale_price)){
            $price = $product->meta->sale_price;
        } else {
            $price = $product->meta->regular_price;
        }

        Cart::add(array(
            'id' => $row_id, // inique row ID
            'name' => $product->name,
            'price' => $price,
            'quantity' => $request->qty,
            'attributes' => array(
                'product_id' => $product->id,
                'image' => $product->meta->image_1,
            )
        ));

        alert()->success('Item Berhasil Ditambahkan ke Cart', 'Item Added');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        foreach($request->row_id as $i => $row){
            //remove carts
            Cart::remove($request->row_id[$i]);

            //add carts
            $product = Product::find($request->product[$i]);
            $row_id = rand ( 0,1000000000 ); //generate row id
            $user_id = 1; //generate user id

            if(!empty($product->meta->sale_price)){
                $price = $product->meta->sale_price;
            } else {
                $price = $product->meta->regular_price;
            }

            Cart::add(array(
                'id' => $row_id, // inique row ID
                'name' => $product->name,
                'price' => $price,
                'quantity' => $request->quantity[$i],
                'attributes' => array(
                    'product_id' => $product->id,
                    'image' => $product->meta->image_1,
                )
            ));

        }
        alert()->success('Carts Berhasil di Update', 'Cart Updated');
        return redirect()->back();
    }

    public function delete($id)
    {
        Cart::remove($id);
        
        alert()->error('Carts Berhasil di Hapus', 'Item Delete');
        return redirect()->back();
    }
}
