<?php

namespace App\Http\Controllers;

use Database;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class OrderController extends Controller
{

      /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $product = Product::latest()->paginate(10);
        return view('order.order_landing', compact('product'));
    }


    public function histori()
    {

        // $order = Order::latest()->paginate(10);
        $order = Order::with('product')->get();
        $product = Product::all();
        return view('order.order_history', compact('product'), compact('order'));
    }

    public function show($id){
        $data = array(
            'pageid' => "post",
            'post' => Product::find($id)
        );
        return   view('order.order_process')->with ($data);
    }


        /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'cust_name'   => 'required',
           'cust_cuan'   => 'required',
           'cust_contact'   => 'required',
        ]);


        $order = Order::create([
            'buyer_name'     => $request->cust_name,
            'product_id'     => $request->product_id,
            'buyer_contact'     => $request->cust_contact,
            'amount'     => $request->cust_cuan
        ]);

        if ($order) {
            //redirect dengan pesan sukses
            return redirect()->route('order.index')->with(['success' => 'Berhasil Memesan Makanan/Minuman']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('order.index')->with(['error' => 'Gagal Memesan Makanan/Minuman']);
        }
    }
    

    
}
