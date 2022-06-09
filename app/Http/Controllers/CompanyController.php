<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["companies"] = Company::paginate(10);
        return view('companies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");

        if ($image = $request->file('logo')) {
            $data['logo'] = $image->store('companies', 'public');
        }

        Company::create($data);
        return redirect()->route('company.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $tempCompany = Company::findOrFail($company->id);
        return view('companies.edit', compact('tempCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->except(["_token", "_method"]);
        if ($request->hasFile('logo')) {
            $tempCompany = Company::findOrFail($company->id);
            Storage::delete('public/' . $tempCompany->logo);
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }
        Company::where('id', '=', $company->id)->update($data);
        $tempCompany = Company::findOrFail($company->id);
        return view('companies.edit', compact('tempCompany'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $tempCompany = Company::findOrFail($company->id);
        if (Storage::delete('public/' . $company->logo)) {
            Company::destroy($company->id);
        }
        return redirect('company');
    }
}
