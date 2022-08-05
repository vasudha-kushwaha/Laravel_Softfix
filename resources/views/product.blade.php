<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Product</title>
</head> 
<body>
  <br>
  <!-- Insert Product -->
<div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#proModel" onClick="loadCategory()">Add new Product</button>
  <form action="" class="addCategory1" id="proFormID" enctype="multipart/form-data">
    @csrf
      <!-- Modal -->
  <div class="modal fade" id="proModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Product</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td>Select Product Category</td>
              <td>
                <!-- Category will load from database -->
                <select name="cat_id" class="cat_id">
                  
                </select>
              </td>
            </tr>
            <tr>
              <td>Product Name</td>
              <td>
                <input type="text" name="name" id="name">
              </td>
            </tr>
            <tr>
              <td>Description</td>
              <td>
                <input type="text" name="desc" id="desc">
              </td>
            </tr>
            <tr>
              <td>Origin</td>
              <td>
                <input type="text" name="origin" id="origin">
              </td>
            </tr>
            <tr>
              <td>Price</td>
              <td>
                <input type="text" name="price" id="price">
              </td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td>
                <input type="text" name="qty" id="qty">
              </td>
            </tr>
            <tr>
              <td>Image</td>
              <td>
                <input type="file" name="img" id="img_image">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" value="submit" id="submit" class="btn btn-primary">
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
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Product" >
  </div>
</div>

<!-- View Product -->
<br>
<div class="container">
  <div class="well well-lg">
    <h2>List of Products</h2>
    <table class="table" id="table-data">
    <thead>
    <tr>
        <td>Product Id</td>
        <td>Category Name</td>
        <td>Category Id</td>
        <td>Product Name</td>
        <td>Description</td>
        <td>Origin</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Photo</td>
        <td>Created At</td>
        <td>Updated At</td>
        <td>Manage Products</td>
      </tr>
    </thead>
    <tbody id="tabledata">
    </tbody>    
    </table>
  </div>
</div>
@csrf

<!-- Edit Product -->
<div class="container">
  <!-- Edit Modal -->
  <form action="" class="editCategory" id="editFormID" enctype="multipart/form-data">
    @csrf
      <!-- Modal -->
  <div class="modal fade" id="editModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Product Details</h4>
        </div>
        <div class="modal-body">
        <table class="table">
            <tr>
              <td>Select Product Category</td>
              <td>
              <input type="hidden" name="" id="c_id">
              <input type="hidden" name="" id="c_name">
                <!-- Category will load from database -->
                <select name="cat_id2" class="" id="cat_id2"></select>
              </td>
            </tr>
            <tr>
              <td>Product Name</td>
              <td>
                <input type="hidden" name="pro_id" id="pro_id">
                <input type="text" name="name2" id="name2">
              </td>
            </tr>
            <tr>
              <td>Description</td>
              <td>
                <input type="text" name="desc2" id="desc2">
              </td>
            </tr>
            <tr>
              <td>Origin</td>
              <td>
                <input type="text" name="origin2" id="origin2">
              </td>
            </tr>
            <tr>
              <td>Price</td>
              <td>
                <input type="text" name="price2" id="price2">
              </td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td>
                <input type="text" name="qty2" id="qty2">
              </td>
            </tr>
            <tr>
              <td>Image</td>
              <td>
                <img src="" alt="" id="displayImage"/>
                <input type="file" name="img2" id="img2">
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

function edit_pro(id){
      $.get('/getPro/'+id, function(pro){
        $('#c_id').val(pro.id);
        $('#c_name').val(pro.id);

          $('#pro_id').val(pro.id);
          $('#name2').val(pro.Name);
          $('#desc2').val(pro.Description);
          $('#origin2').val(pro.Origin);
          $('#price2').val(pro.Price);
          $('#qty2').val(pro.Qty);
          $('#img2').val(pro.Photo);
          $('#editModel').modal('toggle');
      });    
   } 

function loadCategory(){
  // alert("ok");
      $.ajax({
        url : "/loadCat",
        type : "POST",
        data : {'_token': $('input[name="_token"]').val()},
        dataType : "json",
        success:function(data){
          $(".cat_id").html(data.output);
        }
      });
    }

    function loadCategoryforEdit(id){
      var cat_id=id;
      // alert(cat_id);
      $.ajax({
        url : "/loadCatEdit/"+ cat_id,
        type : "POST",
        data : {'_token': $('input[name="_token"]').val()},
        dataType : "json",
        success:function(data){
          $("#cat_id2").html(data.output);
        }
      });
    }

function loadTable(){
      $.ajax({
        url : "/viewPro",
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
                url : "/searchPro/"+ search_term,
                type : "POST",
                data : {search: search_term, _token : _token},
                dataType : "json",
                success :  function(data){
                  $("#tabledata").html(data.output);
                }
            });
        }            
});

$("#proFormID").on('submit', function(e) {
    e.preventDefault();
    var image = $('#img_image').val();
    
    var form = $(this);
    //var form = new FormData(this);
    //console.log(formData);
    form.append('images',image);
    var url = form.attr('/pro'); 
    $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(),
         dataType : "json", 
         success: function(data){
          if(data.status){
            alert(data.message);
            $("#proModel").modal('toggle');
            loadTable();
          }    
          else{
            alert("Product Not Saved");
          }
        }
    });
});
   
   function delete_call(id){
    if(confirm("Do you really want to delete this record")){
      var Pro_id=id;
      $.ajax({
        type:"DELETE",
        url:"/delPro/"+ Pro_id,
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

  function shareText(id){
    if(confirm("Do you really want to delete this record")){
      var Pro_id=id;
      $.ajax({
        type:"DELETE",
        url:"/delPro/"+ Pro_id,
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

  function sharePDF(id){
    if(confirm("Do you really want to export this record")){
      var Pro_id=id;
      $.ajax({
        type:"GET",
        url:"/sharePDF/"+ Pro_id,
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




   $("#editFormID").on('submit', function(e) {
    e.preventDefault(); 
    var editForm=$(this);
    // alert("okk");
    // var url=editForm.attr('updatePro');
    let _token = $("input[name= _token]").val();
    $.ajax({
         type: "PUT",
         url: "{{route('update.pro')}}",
         data: editForm.serialize(),
         dataType : "json", 
         success: function(data){
          if(data.status){
            alert(data.message);
            $("#editModel").modal('toggle');
            loadTable();
          }    
          else{
            alert("Product Not Updated");
          }
        }
    });
});

</script>