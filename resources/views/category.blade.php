<?php
  // $list= array("item1","item2", "item3", "item4");
  // echo $list;
  // $var=json_encode($list);
  // echo $var;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body>
<br>
<div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#catModel">Add new Category</button>
  <form action="" class="addCategory1" id="myFormID">
    @csrf
      <!-- Modal -->
  <div class="modal fade" id="catModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Category</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td>Category Name</td>
              <td>
                <input type="text" name="name" id="name">
              </td>
            </tr>
            <tr>
              <td>Category Status</td>
              <td>
                <input type="text" name="status" id="status">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" value="Submit" id="Submit" class="btn btn-primary">
        </div>
      </div>      
    </div>
  </div>
  </form>
 
</div>
<br>
<!-- live serch -->
<div class="container">
  <div class="well well-lg">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Category" >
  </div>
</div>



<!-- view all data -->
<br>
<div class="container">
  <div class="well well-lg">
    <h2>List of categories</h2>
    <table class="table" id="table-data">
    <thead>
    <tr>
        <td>Category Id</td>
        <td>Category Name</td>
        <td>Status</td>
        <td></td>
        <td>Created At</td>
        <td>Updated At</td>
        <td>Manage Categories</td>
      </tr>
    </thead>
    <tbody id="tabledata">
    </tbody>    
    </table>
  </div>
</div>
@csrf

<div class="container">
  <!-- Edit Modal -->
  <form action="" class="editCategory" id="editFormID">
    @csrf
      <!-- Modal -->
  <div class="modal fade" id="editModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td>Category Name</td>
              <td>
                <input type="hidden" name="id" id="id2">
                <input type="text" name="name" id="name2">
              </td>
            </tr>
            <tr>
              <td>Category Status</td>
              <td>
                <input type="text" name="status" id="status2">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" value="Update" id="Update" class="btn btn-primary">
        </div>
      </div>      
    </div>
  </div>
  </form>
  <!-- Edit Modal -->
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>

<script>

function loadTable(){
      $.ajax({
        url : "/view",
        type : "POST",
        data : {'_token': $('input[name="_token"]').val()},
        dataType : "json",
        success:function(data){
          $("#tabledata").html(data.output);
        }
      });
    }

$(document).ready(function(){
    loadTable();
});

$("#search").on("keyup", function(){
    var search_term= $(this).val();
        let _token = $("input[name= _token]").val();
        if(search_term == ""){
         loadTable(); 
        }
        else{
            $.ajax({
                url : "/search/"+ search_term,
                type : "POST",
                data : {search: search_term, _token : _token},
                dataType : "json",
                success :  function(data){
                  $("#tabledata").html(data.output);
                }
            });
        }            
});

$("#myFormID").submit(function(e) {
    e.preventDefault(); 
    var form = $(this);
    var url = form.attr('/cat'); 
    $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(),
         dataType : "json", 
         success: function(data){
          if(data.status){
            alert(data.message);
            $("#catModel").modal('hide');
          }    
          else{
            alert("Category Not Saved");
          }
        }
    });
});
   
   function delete_call(id){
    if(confirm("Do you really want to delete this record")){
      var Cat_id=id;
      $.ajax({
        type:"DELETE",
        url:"/del/"+ Cat_id,
        data: {
          _token : $("input[name=_token]").val()
        },
        dataType : "json",
        success:function(response){
          if(response.status){
            alert(response.message);
            loadTable();
          }
          else{
            alert("Record Can not deleted");
          }
        }
        
      });
    }
  }

   function edit_call(id){
      $.get('/getCat/'+id, function(cat){
          $('#id2').val(cat.id);
          $('#name2').val(cat.Name);
          $('#status2').val(cat.Status);
          $('#editModel').modal('toggle');
      })    
   } 

   $("#editFormID").on('submit', function(e) {
    e.preventDefault(); 
    let id= $('#id2').val();
    let name= $('#name2').val();
    let status= $('#status2').val();
    let _token = $("input[name= _token]").val();
    $.ajax({
         type: "PUT",
         url: "{{route('update.cat')}}",
         data: {id : id, name : name , status : status, _token : _token},
         dataType : "json", 
         success: function(data){
          if(data.status){
            alert(data.message);
            $("#editModel").modal('toggle');
            loadTable();
          }    
          else{
            alert("Category Not Updated");
          }
        } 
    });
});


</script>