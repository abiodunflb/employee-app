<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(2);
        
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:3',
            'email' => 'required|unique:employees',
            'department' => 'required',
            'gender' => 'required|min:3',
            'image' =>  'image|max:2048'
        ]);

        $image = $request->file('image');
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);

        $data = array(
            'fullname' => $request->fullname,
            'department' => $request->department,
            'gender'        =>      $request->gender,
            'email'        =>       $request->email,
            'image'            =>   $image_name
        );

        Employee::create($data);
        return redirect('employees')->with('success', 'Employee successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($image != ''){
            $request->validate([
                'fullname' => 'required|min:3',
                'email' => 'required|unique:employees',
                'department' => 'required',
                'gender' => 'required|min:3',
                'image' =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else{
            $request->validate([
                'fullname'    =>  'required',
                'gender'     =>  'required',
                'email'     =>  'required',
                'department'     =>  'required'
            ]);

            
        }

        $data = array(
            'fullname' => $request->fullname,
            'gender'        =>      $request->gender,
            'email'        =>       $request->email,
            'department'        =>       $request->department,
            'image'            =>   $image_name
        );

        $employee = Employee::findOrFail($id);
    $employee->update($data);
    return redirect('employees')->with('success', 'Employee data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect('employees')->with('success', 'Employee data deleted');
    }
}
