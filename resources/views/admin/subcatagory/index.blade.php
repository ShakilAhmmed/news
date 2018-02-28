@extends('admin.index')
@section('title','Sub Catagory')
@section('page','Sub Catagory')
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
          <li><a href='/sub-catagory'><i class="ti-pencil-alt2" aria-hidden="true"></i>Catagory</a></li>&nbsp;
          <li><a href='/post'><i class="ti-pencil-alt2" aria-hidden="true"></i>Post</a></li>&nbsp;
          <!-- <li><a href='/catagory'><i class="fas fa-undo" aria-hidden="true"></i></a></li>&nbsp; -->
          <div style="float: right;margin-bottom: 37px;margin-top: -8px;">
          <li><a href='/'><i class="far fa-file-pdf" aria-hidden="true"></i>Pdf</a></li>&nbsp;
          <li><a href='/'><i class="far fa-file-excel" aria-hidden="true"></i>&nbsp;Excel</a></li>&nbsp;
          </div>
       </ul>
          </div>
   </div>
 <div class="container">
  {{Form::open(['url'=>'/sub-catagory','method'=>'post'])}}
    <div class="form-group">
    	{{Form::label('catagory_name','Catagory Name',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
         @foreach($catagory_data as $catagory_data_value) 
          @php 
            $catagory_data_value_list[$catagory_data_value->catagory_name]=$catagory_data_value->catagory_name
          @endphp 
         @endforeach
          {{Form::select('catagory_name',$catagory_data_value_list,null,['id'=>'catagory_name','class'=>'form-control'])}}
      	<br/>
        <span style="color:red;">{{$errors->first('catagory_name')}}</span>
      </div>
    </div>
    <div class="form-group">
      {{Form::label('sub_catagory_name','Sub Catagory Name',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::text('sub_catagory_name','',['class'=>'form-control','placeholder'=>'Enter Catagory Title','title'=>'sub_catagory_name'])}}
        <br/>
        <span style="color:red;">{{$errors->first('sub_catagory_name')}}</span>
      </div>
    </div>
     <div class="form-group">
      {{Form::label('sub_catagory_title','Sub Catagory Title',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::text('sub_catagory_title','',['class'=>'form-control','placeholder'=>'Enter Catagory Title','title'=>'sub_catagory_title'])}}
        <br/>
        <span style="color:red;">{{$errors->first('sub_catagory_title')}}</span>
      </div>
    </div>
    <div class="form-group">
      {{Form::label('sub_catagory_description','Sub Catagory Description',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
       {{Form::textarea('sub_catagory_description','',['class'=>'form-control','placeholder'=>'Enter Catagory Description','title'=>'sub_catagory_description','cols'=>'40','rows'=>'5'])}}
      </br>
      <span style="color:red;">{{$errors->first('sub_catagory_description')}}</span>
      </div>
    </div>
     <div class="form-group">
      {{Form::label('sub_catagory_status','Sub Catagory Status',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::select('sub_catagory_status',['Active' => 'Active', 'Inactive' => 'Inactive'],null,['class'=>'form-control','title'=>'sub_catagory_status'])}}
    </br>
    <span style="color:red;">{{$errors->first('sub_catagory_status')}}</span>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        {{Form::submit('Submit',['class'=>'btn btn-success'])}}
      </div>
    </div>
  {{Form::close()}}
</div>

</br>
 <div class="col-md-12">
              <div class="card">
                  <div class="content table-responsive table-full-width">
                      <table class="table table-hover">
                          <thead>
                            <th>Sl No</th>
                            <th>Catagory Name</th>
                            <th>Sub Catagory Name</th>
                            <th>Catagory Title</th>
                            <th>Status</th>
                            <th>Action</th>
                          </thead>
                          <tbody>
                            @foreach($sub_catagory_data as $key=>$sub_catagory_data_value)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$sub_catagory_data_value->catagory_name}}</td>
                                <td>{{$sub_catagory_data_value->sub_catagory_name}}</td>
                                <td>{{$sub_catagory_data_value->sub_catagory_title}}</td>
                                <td>
                              @if($sub_catagory_data_value->sub_catagory_status=='Active')
                                 <span style="color:green;">
                                  <i class="fa fa-circle" aria-hidden="true"></i> {{$sub_catagory_data_value->sub_catagory_status}}
                                 </span>
                              @else
                               <span style="color:red;">
                                  <i class="fa fa-circle" aria-hidden="true"></i> {{$sub_catagory_data_value->sub_catagory_status}}
                                 </span>
                              @endif


                                 </td>
                                 <td style="display:inline-flex">
                        {{Form::open(['url'=>"/sub-catagory/$sub_catagory_data_value->sub_catagory_id/edit" ,'method'=>'GET'])}}
                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                         &nbsp;
                          @if($sub_catagory_data_value->catagory_status=='Active')
                                 {{Form::open(['url'=>"/sub-catagory/$sub_catagory_data_value->sub_catagory_id" ,'method'=>'GET'])}}
                                   {{Form::submit('Inactive',['class'=>'btn btn-warning'])}}
                                {{Form::close()}}
                              @else
                                {{Form::open(['url'=>"/sub-catagory/$sub_catagory_data_value->sub_catagory_id" ,'method'=>'GET'])}}
                                   {{Form::submit('Active',['class'=>'btn btn-success'])}}
                                {{Form::close()}}
                              @endif
                          &nbsp;
                 {{Form::open(['url'=>"/sub-catagory/$sub_catagory_data_value->sub_catagory_id" ,'method'=>'DELETE'])}}
                  {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm(\'Are You Sure?\')'])}}
                  {{Form::close()}}
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                      <div class="span12" style="text-align:center">{{$sub_catagory_data->links()}}</div>
                  </div>
              </div>
         </div>
@stop