<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Category</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{url('.Upload/FrontEnd/css/js/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{url('.Upload/FrontEnd/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{url('.Upload/FrontEnd/css/owl.theme.default.min.css')}}">
      <script src=".Upload/FrontEnd/js/owl.carousel.min.js"></script>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h2>Task-1</h2>
               <br>
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#imgModel">Add new image to Crausal</button>
               <a href="/viewImage"><button type="button" class="btn btn-info btn-lg">View Crausal</button></a>
           
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <!-- Save new image -->
               <form action="" class="" id="imgFormID" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-- Modal -->
                  <div class="modal fade" id="imgModel" role="dialog">
                     <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Upload New Image</h4>
                           </div>
                           <div class="modal-body">
                              <div id="message">
                              </div>
                              <table class="table">
                                 <tr>
                                    <td><input type="file" name="img" id="img"></td>
                                    <td>
                                       <span id="uploaded_image"></span>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <input type="submit" value="submit" id="submit" class="btn btn-success">
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <br>
         <!-- Owl Crausal Start-->
         <div class="row">
          <div class="col-md-12">
          <div class="owl-carousel loop owl-theme">
          
               <div class="item" >
               <div class="card" id="cr">
                    <img src="{{ URL::to('/') }}/Upload/'.$p->name .'" class="img-thumbnail" width="200" height="200">          
                     <div class="card-body">
                        <h5></h5>
                     </div>
                  </div>
               </div>
               
            </div>
          </div>
            
         </div>
         <!-- Owl Crausal end-->

      </div>
   </body>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
   

   <script src="FrontEnd/js/owl.carousel.min.js"></script>
   <link rel="stylesheet" href="FrontEnd/css/owl.carousel.min.css">
   <link rel="stylesheet" href="FrontEnd/css/owl.theme.default.min.css">

   </html>
<script>


function loadImages(){
      $.ajax({
        url : "/viewImage",
        type : "POST",
        data : {'_token': $('input[name="_token"]').val()},
        dataType : "json",
        success:function(data){
         console.log(data);
          $('#cr').html(data);
        }
      });
    }

   //Save image using ajax
   $(document).ready(function(){
      loadImages();


       $('#imgFormID').on('submit', function(event){
           event.preventDefault();
           $.ajax({
               url: '/uploadImage',
               method : "post",
               data : new FormData(this),
               dataType : "json",
               contentType : false,
               cache : false,
               processData : false,
               success : function(data){
                 $('#message').css('display', 'block');
                 $('#message').html(data.message);
                 $('#message').addClass(data.class_name);
                 $('#uploaded_image').html(data.uploaded_image);
               //   $("#imgModel").modal('toggle');
               }
           });
       });
   });
   //Save image using ajax
</script>
<script>
   $('.loop').owlCarousel({
     loop:true,
     margin:10,
     nav:true,
     dots : true,
     responsive:{
         0:{
             items:1
         },
         600:{
             items:3
         },
         1000:{
             items:5
         }
     }
   })
    
</script>