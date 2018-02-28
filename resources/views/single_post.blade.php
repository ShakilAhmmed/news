@extends('index')
@section('content')

<div class="row-fluid" id="vg-mainbody">
<div class="span8" id="vg-component">
			<div class="row-fluid" id="vg-component-inner">
				<div class="span12">
					<div id="system-message-container"></div>
				</div>
			</div>
			
			<div class="row-fluid carousel_block " style="margin-top: -250px;">
					<div class="span12">
			<div class="n_news_cat_list clearfix"><h4 class="pull-left n_news_cat_list_title" style="tab-size: 20px;font-size: 22px;font-weight: 500;margin-top: 10px">{{$post_value->catagory_name}}</h4><div class="met_carousel_control clearfix">
	<a href="#"><i class="icon-angle-left"></i></a>
	<a href="#"><i class="icon-angle-right"></i></a>
</div>
<div class="n_splitter"><span class="n_bgcolor"></span></div>
	<div class="met_carousel_wrap">
		<div class="met_carousel clearfix">
                 
		          <div class="met_carousel_column"><div class="n_cat_list_image">
								<a href="/single_post/{{$post_value->post_id}}" class="n_news_cat_list_preview">
									<img src="{{asset($post_value->post_image)}}" alt="Starting a new business"/>
								</a>
								<a href="/single_post/{{$post_value->post_id}}" class="n_image_hover_bg"><img src="{{$post_value->post_image}}" alt="" /></a>
							</div><a href="/single_post/{{$post_value->post_id}}" class="n_title_link"><h5 class="n_little_title" style="font-size: 24px;font-weight: 500;    margin-bottom: 20px;">{{$post_value->post_title}}</h5></a>
						<p class="n_short_descr" style="font-size: 19px;line-height: 25px;font-weight: 500;">{{$post_value->post_description,250}}</p>
						@if($post_value->sub_catagory_name=='-No Data Found-')
						@else
						<a href="/single_post/{{$post_value->post_id}}" style="font-size: 21px;font-weight: 500;" class="n_link n_color vg-category-carousel"><b>{{$post_value->sub_catagory_name}}</b></a>
						@endif<img src="{{asset('user_asset/templates/vg_news24/images/view-count.png')}}" alt="" class="n_view_count"><span class="n_view_counter" style="font-size: 17px;">{{$post_value->post_count}}</span>
					</div>
  </div>
</div></div>
	</div>
	</div>
	<div class="comment">
	<span style="font-size: 24px;line-height: 68px;">Comments</span><br/>
	@guest
      <a href="{{ route('login') }}">
      	<button class="btn btn-success" style="height: 48px;width: 86px;">Login</button>
      </a>
       <a href="{{ route('register') }}">
      	<button class="btn btn-warning" style="height: 48px;width: 86px;">Register</button>
      </a>
     @else
     @if(session('success'))
     <div class="alert alert-success">
	  <strong>Success!</strong> {{session('success')}}
	</div>
     @endif
	 <a href="{{ route('logout') }}" class ="btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
		Logout
      </a>
	  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
       </form><br/>
     {{Form::open(['url'=>'/comment','method'=>'post'])}}
       {{Form::hidden('user_id',Auth::user()->id)}}
       {{Form::hidden('post_id',$post_value->post_id)}}
       {{Form::textarea('comment','',['cols'=>'60','rows'=>'5','placeholder'=>'Write Your Comment'])}}
       <span style="color: red">{{$errors->first('comment')}}</span>
       {{Form::hidden('comment_status','Inactive')}}
      {{Form::submit('Submit',['class'=>'btn btn-success'])}}
      {{Form::close()}}
     @endguest
     <div>
       @foreach($comment as $v_comment)
        @if($v_comment->post_id==$post_value->post_id)
     	<label style="font-size: 19px;"><i class="fas fa-user"></i>&nbsp;{{$v_comment->name}}</label>
     	<p style="font-size: 19px;line-height: 37px;font-weight: 500">{{$v_comment->comment}}</p>
        @endif
     	@endforeach
     </div>

    </div>
</div>	
@endsection