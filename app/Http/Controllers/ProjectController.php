<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Gallery;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function project_details($id){

        $gallery = Project::find($id);
        $is_project = 1;
        $gallery_id = $gallery->gallery_id;

        if($gallery_id == 0){
            return view('project_design',compact('gallery', 'is_project'));
        }
        else{
            return view('project_details',compact('gallery', 'is_project'));
        }

    }

    public function project_create(Request $request) {
        $this->validate(request(),[
            'project_name' => ['required'],
            'project_image' => ['required'],
        ]);

        if(isset($request->id)){
            $project = Project::find($request->id);
            // dd($project);
        }else{
            $project = new Project();

            $project->gallery_id = $request->gallery_id;
            // dd($request->all());
        }

        $project->name = $request['project_name'];
        $project->path = $request['project_image'];
        $project->user_id = auth()->user()->id;

        $project->save();

        return redirect(route('home'))->with('success', 'Project saved successfully');
    }

    public function delete_project($id){
        $project = Project::find($id);

        $project->delete();
        return redirect('home');
    }
    public function upload_project(Request $request){

        $img= $_POST['image_base64'];
        $img = explode("base64,",$img)[1];

        $bin = base64_decode($img);

        $im = imageCreateFromString($bin);

        if (!$im) {
            die('Base64 value is not a valid image');
        }
        $name = $request['project_name'];
        $current_timestamp = Carbon::now()->timestamp;

        $img_file = 'images/homes/';
        $image_path = $img_file."".$current_timestamp.".png";


        imagepng($im,'public/'.$image_path, 0);

        if(isset($request->p_id))
            $project = Project::find($request->p_id);
        else
            $project = new Project();

        $project->name = $request->project_name;
        $project->path = $image_path;
        $project->user_id = auth()->user()->id;
        $project->gallery_id = 0;
        $project->save();

        return redirect(route('home'))->with('success', 'Project saved successfully');
    }

}
