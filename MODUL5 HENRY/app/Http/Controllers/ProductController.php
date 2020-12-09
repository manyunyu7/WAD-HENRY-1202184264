<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $product = Product::latest()->paginate(10);
        return view('product.index', compact('product'));
    }


    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('product.create');
    }

    public function showForProduct($id){
        $data = array(
            'pageid' => "post",
            'post' => Product::find($id)
        );
        return  ($data);
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
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'price'     => 'required',
            'stock'     => 'required',
            'description'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
            'image'     => $image->hashName(),
            'name'     => $request->title,
            'description'     => $request->description,
            'stock'     => $request->stock,
            'img_path'     => $image->hashName(),
            'price'     => $request->price,
            'content'   => $request->content
        ]);

        if ($product) {
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('producr.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    /**
     * edit
     *
     * @param  mixed $product
     * @return void
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        //hapus old image
        Storage::disk('local')->delete('public/storage/product/' . $product->img_path);
        $product->delete();

        if ($product) {
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }


    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            // 'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'price'     => 'required',
            'stock'     => 'required',
            'description'   => 'required'
        ]);


        //get data Blog by ID
        $product = Product::findOrFail($product->id);

        if ($request->file('image') == "") {

            $product->update([
                'name'     => $request->title,
                'description'     => $request->description,
                'stock'     => $request->stock,
                'price'     => $request->price,
                'content'   => $request->content
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/storage/product/' . $product->img_path);

            //upload new image
            //upload image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            $product->update([
                'image'     => $image->hashName(),
                'name'     => $request->title,
                'description'     => $request->description,
                'stock'     => $request->stock,
                'img_path'     => $image->hashName(),
                'price'     => $request->price,
                'content'   => $request->content
            ]);
        }

        if ($product) {
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
