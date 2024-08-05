<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Helper\Helper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = User::latest()->get();
        
        //dd($customrs->toArray());
        return Inertia::render("Admin/Customers/Index",compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Admin/Customers/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "customer_id" => "unique:users",
            "phone" => "unique:users",
            "email" => "unique:".User::class
        ],[
            "customer_id.unique" => "This Customer Id Already Exits",
           "phone.unique" => "This Phone Already Exits",
           "email.unique" => "This Email Already Exits"  
        ]);
        $Helper = new Helper();
        $Helper::Customers($request);
        return redirect()->back()->with("success","Customers Creste Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = User::findOrFail($id);
        return Inertia::render("Admin/Customers/Edit",compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse{
        $name = $request->form["name"];
        $http = "http://" . $_SERVER['HTTP_HOST'] . "/";
        $nameResize = str_replace(" ","", $name);

        $customer = User::findOrFail($id);
        
        if ($request->form["file"]) {

            // image upload syatem
            $img = $request->form["file"];
            
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Img'. time() . "." . $endImg;
            $uploadImg = $http . "Customers/" . $RandomPath;

            $img->move(public_path("Customers/"), $RandomPath);

             // old image delete system
             $oldImg = $customer->avatar;
             $explodeOldImg = explode("/", $oldImg);
             $endOldImg = end($explodeOldImg);
             $deletePublicPath = public_path("Customers/".$endOldImg);
             if(File::exists($deletePublicPath)){
                 File::delete($deletePublicPath);
             }
        }else {
            $uploadImg = $customer->avatar;
        }

        $customer->name = $name;
        $customer->email = $request->form["email"];
        $customer->customer_id = $request->form["customer_id"];
        $customer->phone = $request->form["phone"];
        $customer->village = $request->form["village"];
        $customer->national = $request->form["nationals"];
        $customer->father = $request->form["father"];
        $customer->mother = $request->form["mother"];
        $customer->avatar = $uploadImg;
        $customer->update();
        return redirect()->route("customers.index")->with("update","Updated Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
