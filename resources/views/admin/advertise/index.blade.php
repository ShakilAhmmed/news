@extends('admin.index')
@section('title','Advertisement')
@section('page','Advertisement')
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
         <li><a href='/advertise/create'><i class="fas fa-list-ul" aria-hidden="true"></i>Details</a></li>&nbsp;
          <div style="float: right;margin-bottom: 37px;margin-top: -8px;">
          <li><a href='/'><i class="far fa-file-pdf" aria-hidden="true"></i>Pdf</a></li>&nbsp;
          <li><a href='/'><i class="far fa-file-excel" aria-hidden="true"></i>&nbsp;Excel</a></li>&nbsp;
          </div>
       </ul>
          </div>
   </div>

 <div class="container">
  {{Form::open(['url'=>'/advertise','method'=>'post','files'=>true])}}
    <div class="form-group">
    	{{Form::label('advertise_title','Advertise Title',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
      {{Form::text('advertise_title','',['class'=>'form-control'])}} 
      	<br/>
        <span style="color:red;">{{$errors->first('advertise_title')}}</span>
      </div>
    </div>
     <div class="form-group">
      {{Form::label('advertise_type','Avdertise Type',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">        
        {{Form::checkbox('advertise_type','',null,['class'=>'content'])}}
        {{Form::label('content','Content')}}        
        {{Form::checkbox('advertise_type','',null,['class'=>'image'])}}
        {{Form::label('image','Image')}}   
        
        <br/>
      </div>
    </div>
    <div class="form-group">
      {{Form::label('avdertise_description','Avdertise Description',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
       {{Form::textarea('avdertise_description','',['class'=>'form-control description','placeholder'=>'Enter Post Description','title'=>'post_description','cols'=>'40','rows'=>'5','disabled'=>'disabled'])}}
      </br>
      <span style="color:red;">{{$errors->first('avdertise_description')}}</span>
      </div>
    </div>
  <div class="form-group">
  {{Form::label('advertise_image','Image',['class'=>'control-label col-sm-2'])}}
    <div class="col-sm-10">
      {{Form::file('advertise_image',['onchange'=>'readURL(this);','disabled'=>'disabled','class'=>'adver_image'])}}
    </div>
  </div>
  <br>
  <div class="form-group">
    {{Form::label('','')}}
   <div class="col-sm-10">
     <img id='blah' style="height:180px;" src="img/blankavatar.png" alt="your image" class='img-responsive img-circle' />
     <span style="color:red;">{{$errors->first('advertise_image')}}</span> 
  </div>
  </div>  
 
   <div class="form-group">
      {{Form::label('','',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">  
        @php 
          $admin_id=Session::get('admin_id');
        @endphp        
        {{Form::hidden('advertise_creator',$admin_id,['class'=>'form-control','placeholder'=>'Enter Post Title','title'=>'post_creator'])}}
        <br/>
      </div>
    </div>


     <div class="form-group">
      {{Form::label('advertise_status','Advertise Status',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::select('advertise_status',['Active' => 'Active', 'Inactive' => 'Inactive'],null,['class'=>'form-control','title'=>'post_status'])}}
    </br>
    <span style="color:red;">{{$errors->first('advertise_status')}}</span>
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
<script src="http://cdnjs.cloudflare.com/…/li…/jquery/2.1.3/jquery.min.js"></script> 
<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0])
{
var reader = new FileReader();
reader.onload = function (e) {
$('#blah')
.attr('src', e.target.result)
.width(200)
.height(200);
};
reader.readAsDataURL(input.files[0]);
}
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $(".content").unbind().click(function(){
        if ($(".content").is(":checked")) {
            // alert('working');
            $(".description").removeAttr('disabled');
         }
         else
         {
            $(".description").attr('disabled','disabled');
         }
      });

      $(".image").unbind().click(function(){
        if ($(".image").is(":checked")) {
            // alert('working');
            $(".adver_image").removeAttr('disabled');
         }
         else
         {
            $(".adver_image").attr('disabled','disabled');
         }
      });
  });
</script>

@stop