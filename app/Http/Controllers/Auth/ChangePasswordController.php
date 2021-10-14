<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function reset(Request $request){


        $this->validations($request->all())->validate();

       $user = auth()->user();
       $res = Hash::check($request->old_password, $user->password);


       $password = Hash::make($request->password);
       if($res){
        $user->password = $password;
        $user->save();
        return redirect()->back()->with('success', 'Your password has been successfully changed');
    }else{
        return redirect()->back()->withErrors(['old_password' => 'Password does not match']);
    }
  }

  protected function validations(array $data)
  {
    return Validator::make($data, [
        'old_password' => ['required'],
        'password' => ['required','same:confirm-password', 'min:8'],
    ]);
  }

}


