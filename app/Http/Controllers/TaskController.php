<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Images;
// use Validator;
use DB; 
use File;

class TaskController extends Controller
{
    public function ImageUpload(Request $request){
        $validation = Validator:: make($request->all(),[
            'img'=> 'required|image'
        ]);
        if($validation->passes()){

            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $extension = $file->extension(); 
            $new_name= time().$name;
            $file->move('Upload',$new_name);

            // $request->file('img')->storeAs('Upload', $new_name);
            // $path = $request->file('img')->storeAs('Upload', $new_name, 'public');
            // $image->move(public_path('Upload'), $new_name);

            $image = new Images;
            $image->name=$new_name;
            $image->save();
            $path= "Upload/" . $new_name;
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image' => '<img src="'. $path .'" class="img-thumbnail" width="100" height="100"/>',
                'class_name' => 'alert-success'
            ]);
        }
        else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name' => 'alert-danger',
            ]);
        }
    }

    public function ImageView(){
        $photos=Images::all();
        // return view('task1', compact('photos'));
        $output = '';
        foreach($photos as $p)
        {
           $output.= '
                    <div class="card">
                    <img src="{{ URL::to('/') }}/Upload/'.$p->name .'" class="img-thumbnail" width="200" height="200">          
                     <div class="card-body">
                        <h5></h5>
                     </div>
                  </div>';           
        }
        // echo $output;
        // echo "hello";
        // exit;
        echo json_encode(array('output'=> $output));

        // return response()->json([
        //     'uploaded_image' => '<img src="Upload/'. $photos->name .'" class="img-thumbnail" width="200" height="200"/>',
        // ]);
    }



}
