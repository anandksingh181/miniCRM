<?php

namespace App\Http\Controllers;

use App\Http\Requests\Companies\CreateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $company = DB::table("companies")->get();
        // return view('admin.listCompany',['companies'=> $company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.createCompany");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $createRequest)
    {

        $fileName = time() . "-as." . $createRequest->file('logo')->getClientOriginalExtension();
        $createRequest->file('logo')->storeAs('public',$fileName);

        $data = array(
          "name"=> $createRequest->name,
          "email"=> $createRequest->email,
          "logo"=> $createRequest->logo = $fileName,
          "website"=> $createRequest->website,
        );

        $company = DB::table("companies")->insert($data);
        return redirect()->route("company.create")->with("success","successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = DB::table("companies")->get();
        return view('admin.listCompany',['companies'=> $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = DB::table("companies")->find($id);
        return view('admin.editCompany',["comp"=> $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRequest $createRequest, string $id)
    {
        $fileName = time() . "-as." . $createRequest->file('logo')->getClientOriginalExtension();
        $createRequest->file('logo')->storeAs('public',$fileName);

        $data = array(
          "name"=> $createRequest->name,
          "email"=> $createRequest->email,
          "logo"=> $createRequest->logo = $fileName,
          "website"=> $createRequest->website,
        );

        $company = DB::table("companies")->where("id",$id)->update($data);
        return redirect()->route("company.show",['company'])->with("success","successfully Updated ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

         DB::table("companies")->where("id",$id)->delete();
        return redirect()->route('company.show',['company']);
    }
}
