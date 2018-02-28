@extends('admin.index')
@section('title','Post Edit')
@section('page','Post Edit')
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
         <li><a href='/post'><i class="fas fa-undo" aria-hidden="true"></i></a></li>&nbsp;
          <div style="float: right;margin-bottom: 37px;margin-top: -8px;">
          <li><a href='/'><i class="far fa-file-pdf" aria-hidden="true"></i>Pdf</a></li>&nbsp;
          <li><a href='/'><i class="far fa-file-excel" aria-hidden="true"></i>&nbsp;Excel</a></li>&nbsp;
          </div>
       </ul>
          </div>
   </div>

 <div class="container">
  {{Form::open(['url'=>"/post-details/$edit_data->post_id",'method'=>'put','files'=>true])}}
    <div class="form-group">
    	{{Form::label('catagory_name','Catagory Name',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
      @php $catagory_data_array=[''=>'--select--'] @endphp
      @foreach($catagory as $catagory_data_get)
       @php 
        $catagory_data_array[$catagory_data_get->catagory_name]=$catagory_data_get->catagory_name
       @endphp
      @endforeach
      {{Form::select('catagory_name',$catagory_data_array,null,['class'=>'form-control catagory_name','title'=>'catagory_name'])}}

      	<br/>
        <span style="color:red;">{{$errors->first('catagory_name')}}</span>
      </div>
    </div>
    <div class="form-group">
      {{Form::label('sub_catagory_name','Sub Catagory Name',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">  
        {{Form::select('sub_catagory_name',[''=>'--select--'],null,['class'=>'form-control sub_catagory_name'])}}        
        <br/>
        <span style="color:red;">{{$errors->first('sub_catagory_name')}}</span>
      </div>
    </div>
     <div class="form-group">
      {{Form::label('post_title','Post Title',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::text('post_title',$edit_data->post_title,['class'=>'form-control','placeholder'=>'Enter Post Title','title'=>'post_title'])}}
        <br/>
        <span style="color:red;">{{$errors->first('post_title')}}</span>
      </div>
    </div>
    <div class="form-group">
      {{Form::label('post_description','Post Description',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
       {{Form::textarea('post_description',$edit_data->post_description,['class'=>'form-control','placeholder'=>'Enter Post Description','title'=>'post_description','cols'=>'40','rows'=>'5'])}}
      </br>
      <span style="color:red;">{{$errors->first('post_description')}}</span>
      </div>
    </div>
  <div class="form-group">
  {{Form::label('post_image','Image',['class'=>'control-label col-sm-2'])}}
    <div class="col-sm-10">
      {{Form::file('post_image','',['onchange'=>'readURL(this);'])}}
  <!--   <input type="file" name="image" onchange="readURL(this);"> -->
    </div>
  </div>
  <br>
  <div class="form-group">
    {{Form::label('','')}}
   <div class="col-sm-10">
     <img id='blah' style="height:180px;"  src="{{asset($edit_data->post_image)}}" alt="your image" class='img-responsive img-circle' />
     <span style="color:red;">{{$errors->first('post_image')}}</span> 
  </div>
  </div>  
 
   <div class="form-group">
      {{Form::label('','',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">  
        @php 
          $admin_id=Session::get('admin_id');
        @endphp        
        {{Form::hidden('post_creator',$admin_id,['class'=>'form-control','placeholder'=>'Enter Post Title','title'=>'post_creator'])}}
        <br/>
      </div>
    </div>


     <div class="form-group">
      {{Form::label('post_status','Post Status',['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">          
        {{Form::select('post_status',['Active' => 'Active', 'Inactive' => 'Inactive'],null,['class'=>'form-control','title'=>'post_status'])}}
    </br>
    <span style="color:red;">{{$errors->first('post_status')}}</span>
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
        $(".catagory_name").change(function(){
          var catagory_name=$(this).val();
          $.ajax({
              url:'/sub-catagory-data',
              type:'post',
              data: {'catagory_name':catagory_name,'_token': $('input[name=_token]').val()},
              success:function(data){
                console.log(data)
                if(data[0])
                {
                  $('.sub_catagory_name').html('');
                  for(var i=0;i<data.length;i++)
                  {
                    $(".sub_catagory_name").append("<option>"+data[i].sub_catagory_name+"</option>");
                  }
                }
                else
                {
                  $(".sub_catagory_name").append("<option selected>-No Data Found-</option>");
                }
              }
          });
        });
     });

    </script>
@stop