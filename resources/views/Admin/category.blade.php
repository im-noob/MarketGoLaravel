@extends('Admin.main')
@section('Category')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Category And Subcategory List</h4>
            </div>
            <div class="card-body">
                <div class= "row">
                    <div class= "col-sm-6">
                        <div  class="card">
                            <h3 style="text-align:center;">Category List</h3>
                            <div class="list-group" id="list-tab" role="tablist">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($data as $msg)
                                    @if($i++ == 0)
                                        <a class="list-group-item list-group-item-action active cat" id="{{$msg->wor_cat_id}}" data-toggle="list" href="#subcat" role="tab" aria-controls="prince">{{$msg->wor_cat_name}}</a>
                                    @else
                                        <a class="list-group-item list-group-item-action cat" id="{{$msg->wor_cat_id}}" data-toggle="list" href="#subcat" role="tab" aria-controls="prince">{{$msg->wor_cat_name}}</a>
                                    @endif
                                @endforeach
                                <a class="list-group-item list-group-item-action"  data-toggle="modal" data-target="#Category" href="#subcat" role="tab" aria-controls="prince"><span style="font-weight:500;color:blue;"> Addnew </span></a>
                            </div>
                            <!-- <table class= "table table-hover">
                                <thead class="thead-light">
                                    <th>Category List</th>
                                </thead>
                                <tbody id="catAdd">
                                    <tr id="none">
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <form >
                                                        <input type="text"  id="catname" placeholder = "New Category">
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button onclick="addCategory()" >Add</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach($data as $msg)
                                    <tr id = "{{$msg->wor_cat_id}}">
                                        <td>{{$msg->wor_cat_name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> -->
                        </div>
                    </div>
                    <div class= "col-sm-6">
                        <div class="card">
                            <h3 style="text-align:center;">SubCategory List</h3>
                            <div class="list-group" id="list-cat" role="tablist">
                                @foreach($subcat as $msg)
                                    <a class="list-group-item list-group-item-action" >{{$msg->subcat_name}}</a>	
                                @endforeach
                                <a class="list-group-item list-group-item-action" data-toggle="modal" data-target="#SubCategory"><span style="font-weight:500;color:blue;"> Addnew </span></a>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>
        </div> 
    </div>
</div>

<div class="modal fade" id="Category">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{url('/')}}/admin/addCat" enctype="multipart/form-data">
                    <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                    <div class="form-group">
                        <input type = "text" class="form-control" id="authPhoneNo" name="catname" placeholder="Enter Category Name." required>
                    </div>
                    <br>
                    
                    Select pic : <input type="file" name="pic" id="pic" class="form-control" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" > Add </button>
                    </div>
                </form>
            </div>   
        </div>
	</div>
</div>

<div class="modal fade" id="SubCategory">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Subcategory</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{url('/')}}/admin/addSubcat" enctype="multipart/form-data">
                    <input type="hidden" id="subcat_id" name="id" value="" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <input type = "text" class="form-control" id="authPhoneNo" name="subname"  placeholder="Enter SubCategory Name." required>
                    </div>
                    <br>
                    Select pic : <input type="file" name="pic" class="form-control" />

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" > Add </button>
                    </div>
                </form>
            </div>  
        </div>
	</div>
</div>


<script type = "text/javascript">
   
</script>

<script>

var catid = 0;

function addCategory(){
   var catname = $('#catname').val();

    console.log("Category Name:",catname);
    if(catname == ""){
        alert('Enetr Category Name');
    }
    else{
        $.ajax({
            url:'{{url('/')}}/admin/addCat',
            data:{"name":catname},
            type:'GET'
        }).done(function(data){
            //console.log(data);
            var list = '<tr id = "'+data+'"><td>'+catname+'</td></tr>';
               // console.log(list);
                $('#catAdd').append(list);
                $('#catname').val("");
        });
    }
}


function addSubcategory(){
    var subname = $('#subname').val();
    if(catid == 0){
        alert('No category is Selected');
    }
    else if(subname == ""){
        alert('Enter Subcategory Name')
    }else{
        $.ajax({
            url:'{{url('/')}}/admin/addSubcat',
            data:{"id":catid,"name":subname},
            type:'GET'
        }).done(function(data){
            //console.log(data);
            addSubcategoryToList(subname);
            $('#subname').val("");
        });
    }
}

function addSubcategoryToList(value){
    var list = '<li>'+value+'</li>'
   // console.log(list);
    $('#addSub').append(list);
}

$(document).ready(function(){
    $('body').on('click','.cat',function(){
        var id = $(this).attr('id');
        
        if(id >= 1)
        {
            catid = id;
            console.log('Clicked On table',id);
            //$('#'+id).css('color','green');
            //$('#'+id).css('font-weight','900');
            $('#subcat_id').val(id);
            $.ajax({
                url:'{{url('/')}}/admin/selectSub',
                data:{"form_id":id},
                type:'GET'
            }).done(function(data){
               // console.log(JSON.parse(data));
               $('#list-cat').empty();
                for (const msg of JSON.parse(data)) {
                    var template = '<a class="list-group-item list-group-item-action">'+msg.subcat_name+'</a>';
                    console.log(template);
                    $('#list-cat').append(template);
                }
                var template1 = '<a class="list-group-item list-group-item-action" data-toggle="modal" data-target="#SubCategory"><span style="font-weight:500;color:blue;"> Addnew </span></a>';
                    $('#list-cat').append(template1);
            });

        }
    });

    $('#category').addClass('active');
    });
</script>
@endsection