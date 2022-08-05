<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Category</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   </head>
   <style>
      body {
      margin: 20px auto;
      font-family: 'Lato';
      font-weight: 300;
      width: 600px;
      text-align: center;
      }
      button {
      background: cornflowerblue;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 8px;
      font-family: 'Lato';
      margin: 5px;
      text-transform: uppercase;
      cursor: pointer;
      outline: none;
      }
      button:hover {
      background: orange;
      }
   </style> 
   <body>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="#">Home</a></li>
               <li><a href="/cat">Category</a></li>
               <li><a href="/pro">Product</a></li>
               <li><a href="/slider">Task 1</a></li>
               <li><a href="/timetable">Timetable</a></li>
               
            </ul>
            <button class="btn btn-danger navbar-btn">Log Out</button>
         </div>
      </nav>
      <button class="first">Bottom Toast</button>
      <button class="second">Animated Toast</button>
      <button class="third">Error Toast</button>
   </body>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
</html>
<script>
   var toastMixin = Swal.mixin({
     toast: true,
     icon: 'success',
     title: 'General Title',
     animation: false,
     position: 'top-right',
     showConfirmButton: false,
     timer: 3000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
   });
   
   document.querySelector(".first").addEventListener('click', function(){
   Swal.fire({
     toast: true,
     icon: 'success',
     title: 'Posted successfully',
     animation: false,
     position: 'bottom',
     showConfirmButton: false,
     timer: 3000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
   })
   });
   
   document.querySelector(".second").addEventListener('click', function(){
   toastMixin.fire({
     animation: true,
     title: 'Signed in Successfully'
   });
   });
   
   document.querySelector(".third").addEventListener('click', function(){
   toastMixin.fire({
     title: 'Wrong Password',
     icon: 'error'
   });
   });
</script>