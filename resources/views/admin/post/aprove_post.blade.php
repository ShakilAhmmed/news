@extends('admin.index')
@section('title','Pending Post Details')
@section('page','Pending Post Details')
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
         <li><a href='/post-details'><i class="fas fa-undo" aria-hidden="true"></i></a></li>&nbsp;
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
                            <th>Catagory Name</th>
                            <th>Sub Catagory Name</th>
                            <th>Post Title</th>
                            <th>Post Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </thead>
                          <tbody>
                        
                              <tr>
                              @foreach($post as $key=>$post_value)
                                <td>{{$key+1}}</td>
                                <td>{{$post_value->catagory_name}}</td>
                                <td>{{$post_value->sub_catagory_name}}</td>
                                <td>{{$post_value->post_title}}</td>
                                <td>
                                   <img src="{{asset($post_value->post_image)}}"  height="56px" alt="Newspaper" onerror="this.src='{{asset('img/blankavatar.png')}}'" />
                                </td>
                                <td>
                                @if($post_value->post_status=='Active')
                                 <span style="color:green;">
                                  <i class="fa fa-circle" aria-hidden="true"></i>{{$post_value->post_status}}
                                 </span>
                                @else
                                <span style="color:red;">
                                  <i class="fa fa-circle" aria-hidden="true"></i>{{$post_value->post_status}}
                                 </span>
                                @endif
                                 </td>
                                <td style="display:inline-flex">
                        {{Form::open(['url'=>"/post-details/$post_value->post_id/edit" ,'method'=>'GET'])}}
                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                         &nbsp;
                         @if($post_value->post_status=='Active')
                                 {{Form::open(['url'=>"/post-details/$post_value->post_id" ,'method'=>'GET'])}}
                                   {{Form::submit('Inactive',['class'=>'btn btn-warning'])}}
                                {{Form::close()}}
                        @else
                        {{Form::open(['url'=>"/post-details/$post_value->post_id" ,'method'=>'GET'])}}
                                   {{Form::submit('Active',['class'=>'btn btn-success'])}}
                                {{Form::close()}}
                        @endif
                              &nbsp;
                 {{Form::open(['url'=>"/post-details/$post_value->post_id" ,'method'=>'DELETE'])}}
                  {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm(\'Are You Sure?\')'])}}
                  {{Form::close()}}
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                    <div class="span12" style="text-align:center;">{{$post->links()}}</div>
                  </div>
              </div>
         </div>
@stop