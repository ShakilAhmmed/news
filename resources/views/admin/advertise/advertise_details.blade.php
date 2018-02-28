@extends('admin.index')
@section('title','Advertisement Details')
@section('page','Advertisement Details')
@section('main_content')
@if(session('error'))
<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong>   {{session('error')}}
  </div>

@endif
@if(session('success'))
<div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong>  {{session('success')}}
  </div>
@endif
<style type="text/css">
        .dropdown_test li {display: inline;}
        .dropdown_test li a{padding: 10px; background: #666;color: #fff; border-radius: 5px}
        .dropdown_test li a:hover{padding: 12px; background: #666;color: #fff; border-radius: 5px}
</style>
<div>
          <div class="panel-body text-left">
             <ul class='dropdown_test'>
                   
          <li><a href='/admin'><i class="fas fa-tachometer-alt" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li><a href='/catagory'><i class="ti-pencil-alt2" aria-hidden="true"></i>Catagory</a></li>&nbsp;
          <li><a href='/sub-catagory'><i class="ti-pencil-alt2" aria-hidden="true"></i>Sub Catagory</a></li>&nbsp;
         <li><a href='/post'><i class="ti-pencil-alt2" aria-hidden="true"></i>Post</a></li>&nbsp;
         <li><a href='/advertise'><i class="fas fa-list-ul" aria-hidden="true"></i>Advertise</a></li>&nbsp;
          <div style="float: right;margin-bottom: 37px;margin-top: -8px;">
          <li><a href='/'><i class="far fa-file-pdf" aria-hidden="true"></i>Pdf</a></li>&nbsp;
          <li><a href='/'><i class="far fa-file-excel" aria-hidden="true"></i>&nbsp;Excel</a></li>&nbsp;
          </div>
       </ul>
          </div>
   </div>
<div class="col-md-12">
              <div class="card">
                  <div class="content table-responsive table-full-width">
                      <table class="table table-hover" id="example" class="display">
                          <thead>
                            <th>Sl No</th>
                            <th>Advertisement Title</th>
                            <th>Advertisement Description</th>
                            <th>Advertisement Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </thead>
                          <tbody>
                        
                              <tr>
                              @foreach($advertise_data as $key=>$advertise_data_value)
                                <td>{{$key+1}}</td>
                                <td>{{$advertise_data_value->advertise_title}}</td>
                                <td>{{ str_limit($advertise_data_value->avdertise_description,30)}}</td>
                                <td>
                                   <img src="{{asset($advertise_data_value->advertise_image)}}" onerror="this.src='{{asset('img/blankavatar.png')}}'" height="56px" alt="Newspaper" />
                                </td>
                                <td>
                                @if($advertise_data_value->advertise_status=='Active')
                                <span style="color:green;">
                                  <i class="fa fa-circle" aria-hidden="true"></i>{{$advertise_data_value->advertise_status}}
                                 </span>
                                @else
                                <span style="color:red;">
                                  <i class="fa fa-circle" aria-hidden="true"></i>{{$advertise_data_value->advertise_status}}
                                 </span>
                                @endif
                                 </td>
                                <td style="display:inline-flex">
                        {{Form::open(['url'=>"/advertise/$advertise_data_value->advertise_id/edit" ,'method'=>'GET'])}}
                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                             &nbsp;
                             @if($advertise_data_value->advertise_status=='Active')
                                 {{Form::open(['url'=>"/advertise/$advertise_data_value->advertise_id" ,'method'=>'GET'])}}
                                   {{Form::submit('Inactive',['class'=>'btn btn-warning'])}}
                                {{Form::close()}}
                            @else
                            {{Form::open(['url'=>"/advertise/$advertise_data_value->advertise_id" ,'method'=>'GET'])}}
                                    {{Form::submit('Active',['class'=>'btn btn-success'])}}
                                    {{Form::close()}}
                            @endif
                              &nbsp;
                            {{Form::open(['url'=>"/advertise/$advertise_data_value->advertise_id" ,'method'=>'DELETE'])}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm(\'Are You Sure?\')'])}}
                            {{Form::close()}}
                
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    <div class="span12" style="text-align:center;">{{$advertise_data->links()}}</div>
                  </div>
              </div>
         </div>
@stop