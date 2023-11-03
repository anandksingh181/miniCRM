<?php

namespace App\Http\Controllers;

use App\Http\Requests\employees\CreateRequest;
use Illuminate\Http\Request;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

            $data = DB::table("companies")
                        ->orderBy("id", "ASC")
                        ->get();

              return view('admin.createEmployee', ["data"=>$data]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $createRequest)
    {
        $fileName = time() . "-as." . $createRequest->file('profile_picture')->getClientOriginalExtension();
        $createRequest->file('profile_picture')->storeAs('public',$fileName);

        $compID= $createRequest->input('company');

        $data = array(
          "first_name"=> $createRequest->first_name,
          "last_name"=> $createRequest->last_name,
           "company" => $createRequest->company = $compID,
          "email"=> $createRequest->email,
          "phone"=> $createRequest->phone,
          "profile_picture"=> $createRequest->profile_picture = $fileName,
        );

        $company = DB::table("employees")->insert($data);
        return redirect()->route("employee.create")->with("success","successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = DB::table("companies")
                            ->join("employees" , "companies.id", "=", "employees.company")
                            ->select("companies.name as company", "employees.first_name","employees.last_name"
                                ,"employees.email","employees.phone","employees.profile_picture","employees.id")
                           ->paginate(5);

    // dd($companies);
      return view('admin.listEmployee',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = DB::table("employees")->find($id);
        $comp =  DB::table('companies')->orderBy('id')->get();
        // dd($employee);
        return view('admin.editEmployee',["emp"=> $employee, "comp"=>$comp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRequest $createRequest, string $id)
    {

        $fileName = time() . "-as." . $createRequest->file('profile_picture')->getClientOriginalExtension();
        $createRequest->file('profile_picture')->storeAs('public',$fileName);



        $compID= $createRequest->input('company');

        $data = array(
          "first_name"=> $createRequest->first_name,
          "last_name"=> $createRequest->last_name,
           "company" => $createRequest->company = $compID,
          "email"=> $createRequest->email,
          "phone"=> $createRequest->phone,
          "profile_picture"=> $createRequest->profile_picture = $fileName,
        );

        $comp = DB::table("employees")->where("id",$id)->update($data);
        return redirect()->route("employee.show",['employee'])->with("success","successfully Update");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("employees")->where("id",$id)->delete();
        return redirect()->route('employee.show',['employee']);
    }
}
