			<div class="span2" id="vg-right-a" style="margin-top: -250px;">

				<div class="row-fluid">
					<div class="span12">
					
						<h4 class="n_news_cat_list_title">POPULAR POSTS</h4><div class="vg-right-a ">
					@php 
                    $popular_post=DB::table('post')->where('post_status','Active')->orderBy('post_count','DESC')->limit(15)->get();

					@endphp
					
					
						@foreach($popular_post as $popular_post_value)
						<div class="n_latest_post_container clearfix"><a href="/single_post/{{$popular_post_value->post_id}}" class="n_latest_post_picture"><img src="{{asset($popular_post_value->post_image)}}" alt="War of power in Mexico" class="vg-latest-post" /></a><div class="n_latest_post_details">
							<a href="/single_post/{{$popular_post_value->post_id}}" class="n_title_link"><h5 class="n_little_title" style="font-weight: 500;font-size: 16px;line-height: 26px;display: initial;">{{$popular_post_value->post_title}}</h5></a>
							<span class="n_little_date">Published: {{ Carbon\Carbon::parse($popular_post_value->created_at)->format('d-m-Y')}}</span>
						</div>
					</div>
					@endforeach
				</div>
			<div class="vg-right-a ">

<div class="custom"  >
	<p style="margin-top: 20px;"><img class="vg-fullwidth" src="images/ads/1.png" alt="" /></p></div>
</div>
						
					</div>
				</div>

			</div>

			{{--for user footer start--}}

	

	</div>
	<!-- /MAINBODY -->
	
			<div class="n_splitter"><span class="n_bgcolor"></span></div>
		
		<div class="row-fluid">
			
							<div class="span12">
					<div class="vg-bottom ">
<div class="VombieLikeButton">
<!-- 
	<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcodebool.bd%2F&tabs=timeline&width=340&height=210&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1819432271712232" width="340" height="210" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe> 
	 -->
</div></div>
				</div>
															
		</div>
		
	</div><!-- Middle Content Ends -->