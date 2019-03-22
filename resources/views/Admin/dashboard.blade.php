@extends('Admin.main')
@section('dashboardBody')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i class="material-icons">content_copy</i>
                </div>
                <p class="card-category">Total Order</p>
                <h3 class="card-title">{{$total}}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="#pablo">Get More Space...</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="material-icons">store</i>
                </div>
                <p class="card-category">Acrive Order</p>
                <h3 class="card-title">{{$active}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Fixed Issues</p>
                <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                <i class="fa fa-twitter"></i>
                </div>
                <p class="card-category">Followers</p>
                <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">update</i> Just Updated
                </div>
            </div>
            </div>
        </div>
        </div>
            <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Employees Stats</h4>
                <p class="card-category">New employees on 15th September, 2016</p>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                <thead class="text-warning">
                    <th>Order Id</th>
                    <th>Service Man</th>
                    <th>Mobile No</th>
                    <th>customer</th>
                    <th>C mobile</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Work Status</th>
                </thead>
                <tbody>
                    @foreach($data as $msg)
                    <tr>
                    <td>{{$msg->wor_order_id}}</td>
                    <td>{{$msg->name}}</td>
                    <th>{{$msg->Wphone}}</th>
                    <th>{{$msg->cname}}</th>
                    <th>{{$msg->phone}}</th>
                    <th>{{$msg->address}}</th>
                    <td><p>{{$msg->title}}</p>
                        <small>{{$msg->message}}</small></td>
                    <td>{{$msg->workPorgressStatus * 20}} %</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#dashboard').addClass('active');
});
</script>
@endsection