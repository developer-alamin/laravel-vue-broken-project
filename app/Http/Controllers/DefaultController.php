<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dailyInvoice;
use App\Models\Product;

class DefaultController extends Controller
{
     public function StatusUpdate(Request $request)
    {	
    	$tableName = $request->table;
        
         if ($tableName == "Product") {
             $table = Product::findOrFail($request->id);
         }elseif ($tableName == "dailyInvoice") {
             $table = dailyInvoice::findOrFail($request->id);
         }
        
        if ($table->status == 1) {
            $status = 0;
        }else {
            $status = 1;
        }
        $table->status = $status;
        $table->update();
        return redirect()->back()->with("update","Updated Success");
    }
}
