<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\productUpdate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Helper\Helper;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
       // dd($products->toArray());
        return Inertia::render("Admin/Products/Index",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render("Admin/Products/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Helper = new Helper();
        $Helper::Products($request);
        return redirect()->back()->with("success","Product Create Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //dd($product->toArray());
        return Inertia::render("Admin/Products/Edit",compact("product"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $name = $request->form["name"];
        $http = "http://" . $_SERVER['HTTP_HOST'] . "/";
        $nameResize = str_replace(" ","", $name);
        if ($request->form["file"]) {

            // image upload syatem
            $img = $request->form["file"];
            
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Img'. time() . "." . $endImg;
            $uploadImg = $http . "Products/" . $RandomPath;

            $img->move(public_path("Products/"), $RandomPath);

             // old image delete system
             $oldImg = $product->img;
             $explodeOldImg = explode("/", $oldImg);
             $endOldImg = end($explodeOldImg);
             $deletePublicPath = public_path("Products/".$endOldImg);
             if(File::exists($deletePublicPath)){
                 File::delete($deletePublicPath);
             }
        }else {
            $uploadImg = $product->img;
        }

        $check = (($product->price !== $request->form["price"]) || ($product->current !== $request->form["current"])) ? true :false;
        if ($check) {
           
            productUpdate::create([
               "price" =>  $product->price,
               "current" => $product->current,
               "product_id" => $product->id
            ]);
        }
        
        
        $product->name = $request->form["name"];
        $product->price = $request->form["price"];
        $product->current = $request->form["current"];
        $product->img = $uploadImg;
        $product->update();
        return redirect()->route("product.index")->with("update","Updated Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->img) {
            $img = $product->img;

            $explodeImg = explode("/", $img);
            $EndImg = end($explodeImg);
            $deletePath = public_path("Products/" .$EndImg);
            if (File::exists($deletePath)) {
                File::delete($deletePath);
            }  
        }
       $product->Updates()->delete();
       $product->delete();
        return redirect()->back()->with("delete","Deleted Success");
    }
}
