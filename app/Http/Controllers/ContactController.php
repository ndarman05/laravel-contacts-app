<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    public function index(){
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All companies', '');
        $contacts = Contact::orderBy('first_name', 'asc')->where(function($query){
            if($companyId = request('company_id')){
                $query->where('company_id', $companyId);
            }
        })->paginate(10);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create(){
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All companies', '');
        return view('contacts.create', compact('companies'));
    }

    public function show($id){
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    public function store(Request $request){
        $request -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required | email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message','Contact has been added succesfully');
    }

    public function edit($id){
        $contact = Contact::find($id);
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All companies', '');
        return view('contacts.edit', compact('companies', 'contact'));
    }
}
