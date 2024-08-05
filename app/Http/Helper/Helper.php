<?php 

namespace App\Http\Helper;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Helper {
	public static function Customers(object $request) 
	{
       
		$name = $request->name;
        $nameResize = str_replace(" ","", $name);
        $http = "http://" . $_SERVER['HTTP_HOST'] . "/";
        
        if ($request->file("file")) {
            $img = $request->file("file");
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Img'. rand(5,150) . "." . $endImg;
            $uploadImg = $http . "Customers/" . $RandomPath;
           $img->move(public_path("Customers/"), $RandomPath);
            
        }
        if ($request->mobile == true) {
            
        }
        if ($request->mail == true) {
            
        }
       
        $user = new User();
        $user->name = $name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->customer_id = $request->customer_id;
        $user->phone = $request->phone;
        $user->village = $request->village;
        $user->national = $request->nationals;
        $user->father = $request->father;
        $user->mother = $request->mother;
        $user->avatar = $uploadImg;
        $user->save();
	}
}