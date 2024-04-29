<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\viewId;
use Illuminate\Http\Request;

class AdminIdController extends Controller
{
    public function AdminStudentIdPage()
    {
        $viewId = viewId::orderBy("created_at","desc")
        ->with("users","profile")
        ->get();
       // dd($viewId->toArray());
    	return Inertia::render('Admin/Id/ViewId',compact("viewId"));
    }
    public function AdminStudentIdCreatePage(Request $request){
        $request->validate([
            'IdName' => 'required|unique:view_ids',
        ],[
            "IdName.required" => "Please New Id",
            "IdName.unique" => "This Id Already Exists",
        ]);
        $create = viewId::create([
            "IdName" => $request->IdName
        ]);
        return redirect()->back()->with("success","Id Created Success");

    }
    public function AdminViewIdShowPage($id){
        if ($id) {
            $user = User::with("profile")->findOrFail($id);
           
            return Inertia::render("Admin/Id/Show",compact("user"));
        } else {
            return redirect()->back();
        }
    }
    public function AdminViewIdDeletePage(Request $request){
        $id = $request->id;
        $viewId = viewId::findOrFail($id);
        $viewId->delete();
    }
    public function AdminViewIdUpdatePage(Request $request){
        $id = $request->edit["id"];
        $idName = $request->edit["IdName"];
        $status = $request->edit["status"];
        $viewId = viewId::findOrFail($id);
        $viewId->IdName = $idName;
        $viewId->status = $status;
        $viewId->update();
        return redirect()->back()->with("update","Updated Success");
 
    }
}
