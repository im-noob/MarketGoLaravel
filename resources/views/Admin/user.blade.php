@extends('Admin.main')
@section('User')
<div class="content">
    <div class="container-fluid">
            <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Service Provider List</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                <thead >
                    <th>Name</th>
                    <th>Work</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Ratting</th>
                    <th>View</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($data as $msg)
                    <form action="{{url('/')}}/admin/user" method = "GET">
                    <input type = "hidden" name="id" value="{{$msg->wor_info_id	}}" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <tr>
                    <td>{{$msg->name}}</td>
                    <td>{{$msg->no_of_work}}</td>
                    <td>{{$msg->phone}}</td>
                    <td>{{$msg->city}},{{$msg->state}}</td>
                    <td><input type="text" name="Ratting" value="{{$msg->rating}}"></td>
                    <td><input type="text" name="View" value="{{$msg->no_of_profile_view}}"></td>
                    <td><input type="submit" value="Update"></td>
                    <!-- <td><Button  class="btn-link"  data-toggle="modal" data-target="#myModal">Edit</Button></td> -->
                    </tr>
                    </form>
                    @endforeach
                </tbody>
                </table>
        </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content card">
                <div class="modal-header card-header" data-background-color="purple">
                    <h4 class="modal-title">Update Data</h4>
                </div>
                <div class="modal-body card-content">
                    <form action="{{url('/')}}/admin/update" method = "POST">
                        
                        Ratting:<br>
                        
                        <br>
                        No. of View:<br>
                        <input type="text" name="View" value="0">
                        <br><br>
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form> 
                </div>
                <div class="modal-footer">
                    
                </div>
        </div> 
    </div>
</div>
<script>
$(document).ready(function(){
     
    $('#user').addClass('active');
    });
</script>
@endsection