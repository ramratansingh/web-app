<html>
 <head>
  <title>User</title>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
  <script src="js/bootstrap.min.js"></script>
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
 <body>
  <div class="container box">
   <h1 align="center" style="color:#082567;">User Dashboard</h1>
   <br />
   <div class="table-responsive">
    <br />
    <?php 
    session_start();
    if(empty($_SESSION['status'])){
    echo "<script language=\"JavaScript\">\n";
    echo "alert(' You are not logged in!');\n";
    echo "window.location='index.php'";
    echo "</script>";
    }
    else{
      echo "<b>Hii ".$_SESSION['name']."</b>";
    }
    ?>
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
    <button type="button" id="logout_button" class="btn btn-success btn-lg">Log out</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="10%">Name</th>
       <th width="25%">Username</th>
       <th width="25%">Email</th>
       <th width="10%">Mobile No</th>
       <th width="10%">Address</th>
       <th width="10%">Action</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add User</h4>
    </div>
    <div class="modal-body">
     <label>Enter Name *</label>
     <input type="text" name="name" id="name" class="form-control" required="" />
     <br />
     <label>Enter Username *</label>
     <input type="text" name="username" id="username" class="form-control" required="" />
     <br />
     <label>Enter Password *</label>
     <input type="password" name="password" id="password" class="form-control" onblur="checkLength(this)" required="" />
     <br />
     <label>Enter Email *</label>
     <input type="email" name="email" id="email" class="form-control"  required="" />
     <br />
     <label>Enter Mobile No *</label>
     <input type="tel" name="mobile_no" id="mobile_no" pattern="[0-9]{10}"
           class="form-control" required="" />
     <br />
     <label>Enter Address *</label>
     <input type="text" name="address" id="address" class="form-control" required="" />
     <br />

    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
  function checkLength(el) {
  if (el.value.length != 6) {
    alert("length must be exactly 6 characters")
  }
}

$(document).ready(function(){
$('#password').removeAttr('readonly','');
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Add User");
  $('#action').val("Add");
  $('#operation').val("Add");
 });
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var name = $('#name').val();
  var username = $('#username').val(); 
  var password = $('#password').val(); 
  var email = $('#email').val();
  var mobile_no = $('#mobile_no').val(); 
  var address = $('#address').val(); 
  if(name != '' && username != '' &&  password != '' && email != '' && mobile_no != '' && address != '' )
  {
   $.ajax({
    url:"insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("Fields are Required");
  }
 });
 
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#name').val(data.name);
    $('#username').val(data.username);
    $('#password').val(data.password);
    $('#password').attr('readonly','true');
    $('#email').val(data.email);
    $('#mobile_no').val(data.mobile_no);
    $('#address').val(data.address);
    $('.modal-title').text("Edit User");
    $('#user_id').val(user_id);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
    $('#password').removeAttr('readonly','');
 });
 
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });

 $(document).on('click', '#logout_button', function(){

   $.ajax({
    url:"logout.php",
    method:"POST",
    success:function(data)
    {
      alert(data);
    var url= "index.php";
    window.location = url;
    }
   });
 });
 
 
});
</script>