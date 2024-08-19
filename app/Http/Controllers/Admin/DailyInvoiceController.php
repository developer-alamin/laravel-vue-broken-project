<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Helper\Helper;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\dailyInvoice;
use Carbon\Carbon;
use DB;
class DailyInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $date = date('Y-m-d');
        $invoice["data"] = dailyInvoice::latest()->whereDate("created_at",$date)->with("users")->get();
       // dd($invoice["data"]->toArray());
       return Inertia::render("Admin/Invoice/Index",compact("invoice"));
    }
    public function list()
    {
        // $invoice = dailyInvoice::latest()->with("users")
        // ->whereDate('created_at', '<', today())
        // ->get();
 
        // $invoice = $invoice->groupBy(function($item,$key)
        // {
        //     return Carbon::parse($item->created_at)->format('d-m-Y');
        // });


        $invoice = dailyInvoice::select([
            DB::raw("DATE_FORMAT(created_at,'%d-%M-%Y')as date"),
             DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')as callDate"),
            DB::raw("count(user_id) as users"),
            DB::raw('SUM(taka) as taka')
        ])
        ->latest()
        ->whereDate('created_at', '<', today())
        ->groupBy("date")
        ->groupBy("callDate")
        ->get();
       // dd($invoice->toArray());

        return Inertia::render("Admin/Invoice/list",compact("invoice"));
    }
    public function InvoiceStatusUpdate(Request $request)
    {
        $invoice = dailyInvoice::findOrFail($request->id);
        if ($invoice->status == 1) {
            $status = 0;
        }else {
            $status = 1;
        }
        $invoice->status = $status;
        $invoice->update();
        return redirect()->back()->with("update","Updated Success");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = User::latest()->where("isAdmin",'0')->get();
       //dd($customers->toArray());
       return Inertia::render("Admin/Invoice/Create",compact("customers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dailyInvoice::create([
            "taka" => $request->taka,
            "note" => $request->notes,
            "user_id" => $request->id
        ]);

       return redirect()->back()->with("success"," Invoice Created Suucess");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Date = Carbon::createFromFormat('d-m-Y',$id);
        $data["date"] = $Date;
        $data["customers"] = dailyInvoice::latest()->whereDate('created_at',$Date)->with("users")->get();
       
        //dd($data["customers"]->toArray());
        return Inertia::render("Admin/Invoice/Show",compact("data"));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $data["customers"] = User::latest()->where("isAdmin",'0')->get();
        $data["invoice"] = dailyInvoice::with("users")->findOrFail($id);
        //dd($invoice->toArray());
        return Inertia::render("Admin/Invoice/Edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $invoice = dailyInvoice::findOrFail($id);
        
        $invoice->taka = $request->taka;
        $invoice->note = $request->notes;
        $invoice->user_id = $request->usersId;
        $invoice->update();

        $currentDate = Carbon::parse($invoice->created_at)->format('d-m-Y');
       // dd(date("d-m-Y"));
        if ($currentDate == date("d-m-Y")) {
            return redirect()->route("invoice.index")->with("update","Updated Success");
        }else {
            return redirect()->route("invoice.show",$currentDate)->with("update","Updated Success");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       dailyInvoice::destroy($id);
       return redirect()->back();
    }
}
