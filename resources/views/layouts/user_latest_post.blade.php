			<div class="span2" id="vg-right-a" style="margin-top: -250px;">

				<div class="row-fluid">
					<div class="span12">
					
						<h4 class="n_news_cat_list_title">LATEST POSTS</h4><div class="vg-right-a ">
						@php
						$latest_post=DB::table('post')->where('post_status','Active')->orderBy('post_id','DESC')->limit(15)->get();
						@endphp
						@foreach($latest_post as $latest_post_value)
                  <div class="n_latest_post_container clearfix"><a href="/single_post/{{$latest_post_value->post_id}}" class="n_latest_post_picture"><img src="{{asset($latest_post_value->post_image)}}" alt="War of power in Mexico" class="vg-latest-post" /></a><div class="n_latest_post_details">
							<a href="/single_post/{{$latest_post_value->post_id}}" class="n_title_link"><h5 class="n_little_title" style="font-weight: 500;font-size: 16px;line-height: 26px;display: initial;">{{$latest_post_value->post_title}}</h5></a>
							<span class="n_little_date" style="color: #0170F4;">Published: {{ Carbon\Carbon::parse($latest_post_value->created_at)->format('d-m-Y')}}</span>
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