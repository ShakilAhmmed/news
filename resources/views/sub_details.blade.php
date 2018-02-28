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
			<div class="n_news_cat_list clearfix"><h4 class="pull-left n_news_cat_list_title" style="tab-size: 20px;font-size: 22px;font-weight: 500;margin-top: 10px">{{$name}}</h4>
<div class="n_splitter"><span class="n_bgcolor"></span></div>
     @foreach($details as $details_value)
	<div class="met_carousel_wrap">
		<div class="met_carousel clearfix">
		          <div class="met_carousel_column"><div class="n_cat_list_image" style="height: 200px;">
								<a href="/single_post/{{$details_value->post_id}}" class="n_news_cat_list_preview">
									<img src="{{asset($details_value->post_image)}}" alt="Starting a new business"/>
								</a>
								<a href="/single_post/{{$details_value->post_id}}" class="n_image_hover_bg"><img src="{{asset($details_value->post_image)}}" alt="" /></a>
							</div><a href="/single_post/{{$details_value->post_id}}" class="n_title_link"><h5 class="n_little_title" style="font-size: 24px;font-weight: 500;margin-bottom: 20px;">{{$details_value->post_title}}</h5></a>
						<p class="n_short_descr" style="font-size: 19px;line-height: 25px;font-weight: 500;">{{ str_limit($details_value->post_description,250)}}</p>
						<a href="" style="font-size: 21px;font-weight: 500;" class="n_link n_color vg-category-carousel"><b></b></a>
						<img src="{{asset('user_asset/templates/vg_news24/images/view-count.png')}}" alt="" class="n_view_count"><span class="n_view_counter" style="font-size: 17px;">{{$details_value->post_count}}</span>
					</div>
				
  </div>
 </div>
@endforeach
</div>
	<div align="center" style="background-color: #7ED5F8;height: 108px;" ><ul class="pagination">{{$details->links()}}</ul></div>
	</div>
	</div>
</div>	
@endsection