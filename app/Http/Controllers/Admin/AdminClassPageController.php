<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\classes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminClassPageController extends Controller
{
    public function AdminClassViewPage(){
        $classData = classes::orderBy("created_at","desc")->get();
        //dd($classData->toArray());
        return Inertia::render("Admin/Class/View",compact("classData"));
    }

    public function AdminClassCreatePage(Request $request)  {
        $request->validate([
            'name' => 'required|unique:class',
        ],[
            "name.required" => "Enter Class Name",
            "name.unique" => "This Class Already Exists",
        ]);

        $class = classes::create([
            'name'=>$request->name
        ]);
        return redirect()->back()->with("success","Class Created Success");
    }
    public function AdminClassUpdatePage(Request $request)  {
        $id = $request->edit["id"];
        $class = classes::findOrFail($id);
        $class->name = $request->edit["name"];
        $class->status = $request->edit["status"];
        $class->update();
        return redirect()->back()->with("update","Updated Success");
    }

    public function AdminClassUsersShowPage($id) {
        if ($id) {
            $classUsers = classes::with("users")->findOrFail($id);
            //dd($classUsers->toArray());
            return Inertia::render("Admin/Class/Show",compact("classUsers"));
        } else {
            return redirect()->back();
        }
    }

    public function AdminClassDeletePage(Request $request)  {
        $delete = classes::findOrFail($request->id);
        $delete->delete();
       return redirect()->back()->with("delete","Deleted Success");
    }
}
