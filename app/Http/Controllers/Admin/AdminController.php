<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private function check_auth(){
        if(auth()->user()->admin != 1){
            return true;
        }
    }
    public function index () {
        if($this->check_auth()){
            return redirect()->route('index');
        }
        $users = User::count();
        $projects = Project::count();
        $contacts = Contact::count();
        return view('admin.index', compact('users', 'projects', 'contacts'));
    }

    public function users () {
        if($this->check_auth()){
            return redirect()->route('index');
        }
        $users = User::where('admin', 0)->orderBy('id', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    public function message () {
        if($this->check_auth()){
            return redirect()->route('index');
        }
        $messages = Contact::orderBy('id', 'desc')->get();
        return view('admin.message', compact('messages'));
    }

    public function user_delete ($id) {
        if($this->check_auth()){
            return redirect()->route('index');
        }
        if(User::find($id)->delete()){
            return redirect()->route('admin_users')->with('success', 'User Deleted Successfully');
        }else{
            return redirect()->route('admin_users')->with('danger', 'User Was Not Deleted');
        }
    }

    public function message_delete ($id) {
        if($this->check_auth()){
            return redirect()->route('index');
        }
        if(Contact::find($id)->delete()){
            return redirect()->route('admin_message')->with('success', 'Message Deleted Successfully');
        }else{
            return redirect()->route('admin_message')->with('danger', 'Message Was Not Deleted');
        }
    }

    public function user_edit (Request $request, $id) {
        if($this->check_auth()){
            return redirect()->route('index');
        }

        $data = $request->all();
        $password = $data['password'];
        unset($data['_token']);
        unset($data['update']);
        unset($data['password']);

        $user = User::find($id);

        if($password != ''){
            $data['password'] = Hash::make($password);
        }

        $user = $user->update($data);

        if($user){
            return redirect()->route('admin_users')->with('success', 'User Updated Successfully');
        }else{
            return redirect()->route('admin_users')->with('danger', 'User Was Not Updated');
        }
    }

    public function admin_project($id){

        $projects = Project::where('user_id', $id)->get();
        return view('admin.project', compact('projects'));
    }

    public function admin_project_detail($id){

        $gallery = Project::find($id);
        $is_project = 1;
        $gallery_id = $gallery->gallery_id;

        if($gallery_id == 0){
            return view('admin.project_design',compact('gallery', 'is_project'));
        }
        else{
            return view('admin.project_details',compact('gallery', 'is_project'));
        }
    }

    public function admin_project_delete($id){
        $project = Project::find($id);

        $project->delete();
        return redirect()->back();
    }

    public function update_gallery_project(Request $request){
        $this->validate(request(),[
            'project_name' => ['required'],
            'project_image' => ['required'],
        ]);

        if(isset($request->id)){
            $project = Project::find($request->id);
        }else{
            $project = new Project();
            $project->gallery_id = $request->gallery_id;
        }

        $project->name = $request['project_name'];
        $project->path = $request['project_image'];
        $project->user_id = $request['user_id'];

        $project->save();

        return redirect(route('admin_project', $request['user_id']))->with('success', 'Project saved successfully');
    }

    public function upload_project(Request $request){
        $img= $_POST['image_base64'];
        $img = explode("base64,",$img)[1];
        $bin = base64_decode($img);
        $im = imageCreateFromString($bin);
        if (!$im) {
            die('Base64 value is not a valid image');
        }
        $current_timestamp = Carbon::now()->timestamp;
        $img_file = 'images/homes/';
        $image_path = $img_file."".$current_timestamp.".png";
        //imagepng($im,$image_path, 0);
        imagepng($im,'public/'.$image_path, 0);
        if(isset($request->p_id))
            $project = Project::find($request->p_id);
        else
            $project = new Project();
        $project->name = $request->project_name;
        $project->path = $image_path;
        $project->user_id = $request->user_id;
        $project->gallery_id = 0;
        $project->save();

        return redirect(route('admin_project', $request['user_id']))->with('success', 'Project saved successfully');
    }

}
