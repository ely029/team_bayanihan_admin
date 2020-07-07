<!DOCTYPE html>
<head>
    <title>Riders List</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/main.css')}}"/>
<link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>
<html>

<!------ Include the above in your HEAD tag ---------->
<body style="background-color:#D3D3D3;">
   <div id="wrapper">
     <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <i class="fa fa-bars"><span style="margin-left:20px;">Admin Dashboard</span></i>                       
      </a>
    </div>
  </div>
</nav>
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="{{ url('/riders/list')}}" class="active"></i>RIDER LIST</a>
                </li>
                <li>
                    <a href="#">CURRENT TRIPS</a>
                </li>
                <li>
                    <a href="#">COMPLETED TRIPS</a>
                </li>
                <li>
                    <a href="#">CANCELLED TRIPS</a>
                </li>
                <li>
                    <a href="#">CREDIT LOGS</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                       <div style="margin-top:-10px;" class="col-md-4">
                        <h2>Riders List</h2>
                       </div>
                       <div class="col-md-4">
                        <input type="text" class="form-control"/>
                       </div>
                       <div class="col-md-4" style="margin-top:15px;font-size:15px;">
                                
                                <span data-toggle="modal" data-target="#exampleModal"style="margin-right:20px;">
                                    <i class="fa fa-plus" style="font-size:20px;">
                                        <p style="float:right;margin-left:10px;">Add</p>
                                    </i>
                                </span>

     
<!--                                     <span style="margin-right:20px;">
                                    <i class="fa fa-pencil" style="font-size:20px;">
                                        <p style="float:right;margin-left:10px;">Edit</p>
                                    </i>
                                </span> -->
                                    
<!--                                 <span>
                                    <i class="fa fa-trash-o" style="font-size:20px;">
                                        <p style="float:right;margin-left:10px;">Delete</p>
                                    </i>
                                </span> -->
                        
                       </div>
                </div>
            </div>
            <div class="">
                   <table style="background-color:white;"class="table table-bordered">
                <tr>
                    <th>Actions</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Vehicle Model</th>
                    <th>License Number</th>
                </tr>
                @foreach($data as $datas)
                <tr>
                    <td>
                        <div class="dropdown">
                            <span style="font-style:bold;" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">...</span>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#"><i class="fa fa-check" style="margin-left:10px;"></i>Confirm Registration</a></li>
                                    <li><a href="#"><i class="fa fa-plus" style="margin-left:10px;"></i>Add Credits</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_update_{{ $datas->id }}"><i class="fa fa-pencil" style="margin-left:10px;"></i>Edit</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><b><a href="#" class="delete-registration-{{ $datas->id }}" style="color:red;"><i class="fa fa-trash-o"></i>Delete Registration</a></b></li>
                                  </ul>
                         </div>
                    </td>
                    <td>{{ $datas->full_name }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->vehicle_model }}</td>
                    <td>{{ $datas->license_number }}</td>
                </tr>
                @endforeach
            </table>
            </div>
              
        </div>
        <!-- ADD MODAL -->
                                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Rider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="full_name" placeholder="Full Name"  class="form-control">
        <input type="text" id="email" placeholder="Email" style="margin-top:20px;" class="form-control">
        <input type="text" id="vehicle_model" style="margin-top:20px;" placeholder="Vehicle Model" class="form-control">
        <input type="text" id="license_number" style="margin-top:20px;" placeholder="License Number" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" id="add-rider" class="btn btn-primary">Add Rider</button>
      </div>
    </div>
  </div>
</div>
<!-- UPDATE MODAL -->
@foreach($data as $datas)
                            <div class="modal fade" id="modal_update_{{ $datas->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Rider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>Full Name</span>
        <input type="text" class="full_name-{{ $datas->id }}" value="{{ $datas->full_name }}"  class="form-control">
        <span>Email</span>
        <input type="text"  class="email-{{ $datas->id }}" value="{{ $datas->email }}" style="margin-top:20px;" class="form-control">
        <span>Full Name</span>
        <input type="text" class="vehicle_model-{{ $datas->id }}" style="margin-top:20px;" value="{{ $datas->vehicle_model }}" class="form-control">
        <span>License Number</span>
        <input class="license_number-{{ $datas->id }}" type="text" style="margin-top:20px;" value="{{ $datas->license_number}}" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="update-rider-{{ $datas->id }}" class="btn btn-primary">Update Rider</button>
      </div>
    </div>
  </div>
</div>
@endforeach
     <!-- Menu Toggle Script -->
     <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     <script>
        $('document').ready(function(){
               
               $(".fa-bars").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        });
    
    </script>

    @foreach($data as $datas)
    <script type="text/javascript">
           $('document').ready(function(){
                  
                  $('.update-rider-{{ $datas->id }}').click(function(){

                     $.ajax({
                  type: "POST",
                  url: "{{ url('update/rider')}}",
                  data: {
                      id: {{ $datas->id }},
                      full_name: $('.full_name-{{ $datas->id }}').val(),
                      email: $('.email-{{ $datas->id }}').val(),
                      vehicle_model: $('.vehicle_model-{{ $datas->id }}').val(),
                      license_number: $('.license_number-{{ $datas->id }}').val(),
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(result) {
                    alert('you had updated the rider successfully');
                    location.reload();
                  },
                  error: function(result) {

                     alert('there is an error');
                  }
                 });
           });
    });
    </script>
    @endforeach

    @foreach($data as $datas)
    <script type="text/javascript">
           $('document').ready(function(){
                  
                  $('.delete-registration-{{ $datas->id }}').click(function(){

                     $.ajax({
                  type: "POST",
                  url: "{{ url('delete/rider')}}",
                  data: {
                      id: {{ $datas->id }},
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(result) {
                    alert('You already delete the registration');
                    location.reload();
                  },
                  error: function(result) {

                     alert('there is an error');
                  }
                 });
           });
    });
    </script>
    @endforeach
    <script type="text/javascript">
           $('document').ready(function(){
                  
                  $('#add-rider').click(function(){

                     $.ajax({
                  type: "POST",
                  url: "{{ url('add/rider')}}",
                  data: {
                      full_name: $('#full_name').val(),
                      email: $('#email').val(),
                      vehicle_model: $('#vehicle_model').val(),
                      license_number: $('#license_number').val(),
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(result) {
                    alert('you had added the rider successfully');
                    location.reload();
                  },
                  error: function(result) {

                     alert('there is an error');
                  }
                 });
           });
    });
    </script>
</body>
</html>