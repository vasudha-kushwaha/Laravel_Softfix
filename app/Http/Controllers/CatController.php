<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
// use Illuminate\Support\Facades\DB;

class CatController extends Controller
{ 
    public function SearchCategory($name){
            $cat=Category::where('Name','LIKE',"%{$name}%")->get();
            $output = '';
            foreach($cat as $c)
            {
                $s= '';
                if($c->Status == 1){
                    $s="Active";
                }
                else{
                    $s="Inactive";
                }
               $output.= '<tr>
               <td>'.$c->id.'</td>
               <td>'.$c->Name.'</td>
               <td>'.$s.'</td>
               <td>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
               </td>
               <td>'.$c->created_at.'</td>
               <td>'.$c->updated_at.'</td>
               <td>
                 <button class="btn btn-success" onClick="edit_call('.$c->id.')">Edit</button>
                 <button class="btn btn-danger " onClick="delete_call('.$c->id.')" >Delete</button>
               </td>
             </tr>';
            }
            echo json_encode(array('output'=> $output));
    }

    public function GetCategory($id){
        $cat=Category::find($id);
        return response()->json($cat);
    }
    
    public function UpdateCategory(Request $request){
        // echo $request->id; 
        // die();
        $cat=Category::find($request->id);
        $cat->Name=$request['name'];
        $cat->Status=$request['status'];
        $cat->save();
        // return response()->json($cat);
        echo json_encode(array('status'=> true, 'message'=> "Category Updated Successfully"));
    }
    public function DelCategory($id){
        // echo "delete";
        // $cat=Category::find($id);
        $cat = Category::find($id)->delete();
        // return response()->json(['success'=>'Category Deleted Successfully']);
        // dd($id);
        echo json_encode(array('status'=> true, 'message'=> "Category Deleted Successfully"));
    }
    public function SaveCategory(Request $request){
        // echo "Hlo";
        // die();
        $request->validate([
            'name'=> 'required',
            'status'=> 'required',
        ]);
        $cat= new Category;
        $cat->Name=$request['name'];
        $cat->Status=$request['status'];
        $cat->save();
        echo json_encode(array('status'=> true, 'message'=> "Category Saved Successfully"));
        // return redirect('show')->with('message', 'Candidate Details Saved!');
    }
    public function ViewCategory(){
        $cat=Category::all();
        $output = '';
        foreach($cat as $c)
        {
            $s= '';
                if($c->Status == 1){
                    $s="Active";
                }
                else{
                    $s="Inactive";
                }
           $output.= '<tr>
           <td>'.$c->id .'</td>
           <td>'.$c->Name .'</td>
           <td>'.$s.'</td><td>
           <input type="checkbox" class="custom-control-input" id="switch1" name="example">
           </td>
           <td>'.$c->created_at.'</td>
           <td>'.$c->updated_at.'</td>
           <td>
             <button class="btn btn-success" onClick="edit_call('.$c->id.')">Edit</button>
             <button class="btn btn-danger " onClick="delete_call('.$c->id.')" >Delete</button>
           </td>
         </tr>';
        }
        echo json_encode(array('output'=> $output));
        // return view('category' , compact('cat'));
    }
}
