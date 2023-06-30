<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart_product;
use App\Models\Cart_Model;
use Illuminate\Http\Request;
use Cart;
use Validator;
class CartController extends Controller
{
    public function index()
    {
        $categories = Category::whereRaw('top_cat_id is null')->get();

          return view('frontend.cart',compact('categories'));
    }

    public function add(){

        $product=Product::find(request('id'));
        $data['id'] = $product->id;
        $data['qty'] = 1;
        $data['name'] = $product->product_name_az;
        $data['price'] = $product->price;
        $data['weight'] = $product->price;
        $data['options']['slug'] = $product->slug;
        $data['options']['image'] = $product->product_main_image;
        $cartItem=Cart::add($data);

        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            if (!$active_cart_id) {
                $active_cart = Cart_Model::create([
                    'user_id' => auth()->id()
                ]);
                $active_cart_id = $active_cart->id;
                session()->put('active_cart_id', $active_cart_id);
            }

           Cart_product::updateOrCreate(
                ['cart_id' => $active_cart_id, 'product_id' => $product->id],
                ['quantity' => $cartItem->qty, 'price' => $product->price, 'status' => 'Waiting']
            );
        }


        return redirect()->route('cart')
        ->with('message_type','success')
        ->with('message','Product added to cart');
    }
public function destroy($rowId){

    if (auth()->check()) {
        $active_cart_id = session('active_cart_id');
        $cartItem = Cart::get($rowId);
        Cart_product::where('cart_id', $active_cart_id)->where('product_id', $cartItem->id)->delete();
    }



    Cart::remove($rowId);
    return redirect()->route('cart')
    ->with('message_type','success')
    ->with('message','Product removed');
}

// public function remove_all()
// {
//     if (auth()->check()) {
//         $active_cart_id = session('active_cart_id');
//         Cart_product::where('cart_id', $active_cart_id)->delete();
//     }

//     Cart::destroy();

//     return redirect()->route('cart')
//     ->with('message_type','success')
//     ->with('message','All roduct removed');
// }


public function edit($row_id)
{
    $validator = Validator::make(request()->all(), [
        'adet' => 'required|numeric|between:0,5'
    ]);

    if ($validator->fails()) {
        session()->flash('message_type', 'danger');
        session()->flash('message', 'Minimum can be 0 and the maximum can be 5!');

        return response()->json(['success' => false]);
    }

    if (auth()->check()) {
        $active_cart_id = session('active_cart_id');
        $cartItem = Cart::get($row_id);

        if (request('adet') == 0)
            Cart_product::where('cart_id', $active_cart_id)->where('product_id', $cartItem->id)
                ->delete();
        else
            Cart_product::where('cart_id', $active_cart_id)->where('product_id', $cartItem->id)
                ->update(['quantity' => request('adet')]);
    }

    Cart::update($row_id, request('adet'));

    session()->flash('message_type', 'success');
    session()->flash('message', 'Updated');

    return response()->json(['success' => true]);
}


}
