

											<div class="n_stock_market_wrap "><div class="n_stock_market_wrapper">
	<div class="n_stock_market txt">
	@php
	$latest_post=DB::table('post')->where('post_status','Active')->get();
    @endphp
	@foreach($latest_post as $latest_post_value)
	   <div>
			<span style="font-size: 20px;color: #D3C5B4;"><a href="/single_post/{{$latest_post_value->post_id}}">{{$latest_post_value->post_title}}</a></span>
		</div>
		 @endforeach
	</div>
</div></div>

{{--FOR HEADING END--}}
											
				</div>
			</div>

		</div>

					<div class="n_top_line n_bgcolor"></div>
	</header><!-- Header Ends -->
	
	<div class="n_content clearfix">
