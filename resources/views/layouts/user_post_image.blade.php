
		<div class="row-fluid">
			<div class="span12">
				<div class="metro-wrapper">
					<div id="scrollbar1">
						<div class="scrollbar" style="margin-bottom: 224px;">
							<div class="track">
								<div class="thumb n_bgcolor">
									<div class="end"></div>
								</div>
							</div>
						</div>
						<div class="viewport" style="height:210px">
							<div class="overview">
								<div class="metro-slider" style="height: 210px;">
								
									<div class="metro-row">
								@php
					            $latest_post=DB::table('post')->where('post_status','Active')->get();
					          	@endphp
                                 @foreach($latest_post as $latest_post_value)
									<div class="metro-item half"><a class="metro-image" href="/single_post/{{$latest_post_value->post_id}}" title="Adipisicing elit, sed do eiusmod tempor."><img src="{{asset($latest_post_value->post_image)}}" alt="Adipisicing elit, sed do eiusmod tempor."></a><div class="metro-description">
				<div class="metro-icon"><span><i class="icon-magic icon-2x"></i></span></div>
				<div class="metro-misc clearfix">
					<div class="metro-date n_color" style="font-size: 15px;">{{ Carbon\Carbon::parse($latest_post_value->created_at)->format('d-m-Y')}}</div>
					<a class="metro-title" href="/single_post/{{$latest_post_value->post_id}}" title="Adipisicing elit, sed do eiusmod tempor." style="font-size: 17px">{{$latest_post_value->post_title}}</a>
					<p class="metro-text">{{$latest_post_value->post_description}}</p>
				</div>
				
			</div>
		</div>
      @endforeach
 
</div>

								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>