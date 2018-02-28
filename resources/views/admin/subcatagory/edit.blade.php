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
         <li><a href='/sub-catagory'><i class="fas fa-undo" aria-hidden="true"></i></a></li>&nbsp;
          <div style="float: right;margin-bottom: 37px;margin-top: -8px;">
          <li><a href='/'><i class="far fa-file-pdf" aria-hidden="true"></i>Pdf</a></li>&nbsp;
          <li><a href='/'><i class="far fa-file-excel" aria-hidden="true"></i>&nbsp;Excel</a></li>&nbsp;
          </div>
       </ul>
          </div>
   </div>
 <div class="container">
  {{Form::open(['url'=>"/sub-catagory/$sub_catagory_data->sub_catagory_id",'method'=>'put'])}}
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
      </div>
    </div>
    <div class="form-group">
      {{Form::label('sub_catagory_name','Sub Catagory Name',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::text('sub_catagory_name',$sub_catagory_data->sub_catagory_name,['class'=>'form-control','placeholder'=>'Enter Catagory Title','title'=>'sub_catagory_name'])}}
        <br/>
      </div>
    </div>
     <div class="form-group">
      {{Form::label('sub_catagory_title','Sub Catagory Title',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::text('sub_catagory_title',$sub_catagory_data->sub_catagory_title,['class'=>'form-control','placeholder'=>'Enter Catagory Title','title'=>'sub_catagory_title'])}}
        <br/>
      </div>
    </div>
    <div class="form-group">
      {{Form::label('sub_catagory_description','Sub Catagory Description',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
       {{Form::textarea('sub_catagory_description',$sub_catagory_data->sub_catagory_description,['class'=>'form-control','placeholder'=>'Enter Catagory Description','title'=>'sub_catagory_description','cols'=>'40','rows'=>'5'])}}
      </br>
      </div>
    </div>
     <div class="form-group">
      {{Form::label('sub_catagory_status','Sub Catagory Status',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::select('sub_catagory_status',['Active' => 'Active', 'Inactive' => 'Inactive'],null,['class'=>'form-control','title'=>'sub_catagory_status'])}}
    </br>
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
@stop