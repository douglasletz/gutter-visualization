<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyHome;
use Carbon\Carbon;

class MyHomeController extends Controller
{
	public function my_homes(Request $req){

		$name = Carbon::now()->timestamp.$req->file('file')->getClientOriginalName();
		$path = public_path('images/homes');


		$req->file('file')->move($path, $name);
// 		dd($path);

		$my_homes = new MyHome();
		$my_homes->name = $name;
		$my_homes->path = 'images\homes\\'.$name;
		// $my_homes->flag = 1;

		$my_homes->save();

		return redirect(route('myhome_details',$my_homes->id));
	}

	public function myhome_details($id){
    	$gallery = MyHome::find($id);
		return view('project_design',compact('gallery'));
    }

}
