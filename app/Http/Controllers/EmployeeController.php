<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee', compact('employees'));
    }

    public function create()
    {
        return view('create_employee');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_nm' => 'required|max:255',
            'last_nm' => 'required|max:255',
            'company_id' => 'required|integer|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);
    
        Employee::create($validatedData);
    
        return redirect('/employee')->with('success', 'Employee berhasil ditambahkan');
    }    
    
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('edit_employee', compact('employee'));
    }    
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_nm' => 'required|max:255',
            'last_nm' => 'required|max:255',
            'company_id' => 'required|integer',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);
    
        $employee = Employee::findOrFail($id);
        $employee->update($validatedData);
    
        return redirect('/employee')->with('success', 'Employee berhasil diperbarui');
    
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    
        return redirect()->route('employee.index')->with('success', 'Employee berhasil dihapus');
    }


}
