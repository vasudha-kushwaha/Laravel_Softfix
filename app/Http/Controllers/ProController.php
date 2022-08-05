<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
// use DB;
use File;

class ProController extends Controller
{
    public function SearchProduct($name){
        $pro = DB::table('product')
        ->join('category', 'product.Cat_id', '=', 'category.id')
        ->select('category.id', 'category.name', 'product.*')
        ->where('product.Name','LIKE',"%{$name}%" )
        ->orWhere('product.Description','LIKE',"%{$name}%" )
        ->orWhere('product.Origin','LIKE',"%{$name}%" )->get();

        // $pro=Product::where('Name','LIKE',"%{$name}%" )->orWhere('Description','LIKE',"%{$name}%" )->orWhere('Origin','LIKE',"%{$name}%" )->get();
        $output = '';
        foreach($pro as $c)
        {
            $output.= '<tr>
            <td>'.$c->id .'</td>
            <td>'.$c->name .'</td>
            <td>'.$c->Cat_id .'</td>
            <td>'.$c->Name .'</td>
            <td>'.$c->Description .'</td>
            <td>'.$c->Origin.'</td>
            <td>'.$c->Price.'</td>
            <td>'.$c->Qty.'</td>
            <td> <img src='.$c->Photo.'/> </td>
            <td>'.$c->created_at.'</td>
            <td>'.$c->updated_at.'</td>
            <td>
              <button class="btn btn-success" onClick="edit_pro('.$c->id.'); loadCategoryforEdit('.$c->Cat_id.')">Edit</button>
              <button class="btn btn-danger " onClick="delete_call('.$c->id.')" >Delete</button>
            </td>
            </tr>';
        }
        echo json_encode(array('output'=> $output));
    }
    public function SaveProduct(Request $request){

        dd($request->all());
        $request->validate([
            'cat_id'=> 'required',
            'name'=> 'required',
            'desc'=> 'required',
            'origin'=> 'required',
            'price'=> 'required',
            'qty'=> 'required'
        ]);
        $pro= new Product;
        $pro->Cat_id=$request['cat_id'];
        $pro->Name=$request['name'];
        $pro->Description=$request['desc'];
        $pro->Origin=$request['origin'];
        $pro->Price=$request['price'];
        $pro->Qty=$request['qty'];
        // $pro->Photo=$request['img'];
        
        $name;
        if($files=$request->file('image')){   
            //dd("okk");
            $name=time().$files->getClientOriginalName();  
            $files->move('Upload',$name);  
        }
        else{
            //dd("not okk");
        }
        $pro->Photo=$name;
        $pro->save();
        echo json_encode(array('status'=> true, 'message'=> "Product Saved Successfully"));
    }
    public function LoadCategory(){
        $cat=Category::all();
        $output = '';
        foreach($cat as $c)
        {
           $output.= '<option value='.$c->id .'>'.$c->Name .'</option>';
        }
        echo json_encode(array('output'=> $output));
    }

    public function LoadCategoryEdit($c_id){
        $cat=Category::all();
        $output = '';
        foreach($cat as $c)
        {
            if($c->id == $c_id)
                $output .='<option value='.$c->id .' selected="selected">'.$c->Name .'</option>'; 
            else
                $output.= '<option value='.$c->id .'>'.$c->Name .'</option>';
        }
        echo json_encode(array('output'=> $output));
    }

    public function ViewProduct()
    {
        $pro = DB::table('product')
        ->join('category', 'product.Cat_id', '=', 'category.id')
        ->select('category.id', 'category.name', 'product.*')
        ->get();
        $output = '';
        foreach($pro as $c)
        {
           $output.= '<tr>
           <td>'.$c->id .'</td>
           <td>'.$c->name .'</td>
           <td>'.$c->Cat_id .'</td>
           <td>'.$c->Name .'</td>
           <td>'.$c->Description .'</td>
           <td>'.$c->Origin.'</td>
           <td>'.$c->Price.'</td>
           <td>'.$c->Qty.'</td>
           <td> <img src='.$c->Photo.'/> </td>
           <td>'.$c->created_at.'</td>
           <td>'.$c->updated_at.'</td>
           <td>
             <button class="btn btn-success" onClick="edit_pro('.$c->id.'); loadCategoryforEdit('.$c->Cat_id.')">Edit</button>
             <button class="btn btn-danger " onClick="delete_call('.$c->id.')" >Delete</button>
             <button class="btn btn-warning" data-toggle="collapse" data-target=".demo">Share</button>
             <div class="demo collapse">
             <button class="btn btn-primary " onClick="shareText('.$c->id.')" >Share as text</button>
             <button class="btn btn-primary " onClick="sharePDF('.$c->id.')" >Share as Pdf</button>
             </div>
           </td>
         </tr>';
        }
        echo json_encode(array('output'=> $output));
    }

    public function DelProduct($id){
        $pro = Product::find($id)->delete();
        echo json_encode(array('status'=> true, 'message'=> "Product Deleted Successfully"));
    }

    public function GetProduct($id){
        $pro = DB::table('product')
        ->join('category', 'product.Cat_id', '=', 'category.id')
        ->select('category.id', 'category.name', 'product.*')
        ->get();
        $pro = Product::find($id);
        return response()->json($pro);
    }
     
    public function UpdateProduct(Request $request){
        $request->validate([
            'cat_id2'=> 'required',
            'name2'=> 'required',
            'desc2'=> 'required',
            'origin2'=> 'required',
            'price2'=> 'required',
            'qty2'=> 'required'
        ]);
        $pro=Product::find($request->pro_id);
        $pro->Cat_id=$request->cat_id2;
        $pro->Name=$request['name2'];
        $pro->Description=$request['desc2'];
        $pro->Origin=$request['origin2'];
        $pro->Price=$request['price2'];
        $pro->Qty=$request['qty2'];
        $pro->Photo=$request['img2'];
        $pro->save();
        echo json_encode(array('status'=> true, 'message'=> "Product Updated Successfully"));

    }




}
