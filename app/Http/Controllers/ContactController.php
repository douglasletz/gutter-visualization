<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request){
        $this->validations($request->all())->validate();
    	$data = $request->all();
    	Contact::create($data);
    	return redirect(route('contact'))->with('success', 'Contact form submited succesfully');

    }

	protected function validations(array $data)
	{
	    return Validator::make($data, [
	        'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
	        'subject' => ['required', 'max:255'],
	        'message' => ['required'],
	    ]);
	}
}
