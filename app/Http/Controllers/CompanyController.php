<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('company', compact('companies'));
    }

    public function create()
    {
        return view('create_company');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'nullable|email'
        ]);
    
        Company::create($validatedData);
    
        return redirect('/company')->with('success', 'Company berhasil ditambahkan');
    }    
    
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('edit_company', compact('company'));
    }    
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'nullable|email'
        ]);

        $company = Company::findOrFail($id);
        $company->update($validatedData);

        return redirect('/company')->with('succes', 'Data Perusahaan berhasil di update');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
    
        return redirect()->route('company.index')->with('success', 'Data Perusahaan berhasil dihapus');
    }


}
