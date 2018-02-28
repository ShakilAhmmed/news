<style type="text/css">
  .txt{
    font-size: 21px;
  }
</style>		



          <nav class="n_main_menu pull-left">
						
					<a href="/" class="n_menu_home pull-left"><i class="icon-home icon-large"></i></a>
          @php 
          $catagory_data=DB::table('catagory')->where('catagory_status','Active')->get();
          @endphp
               @foreach($catagory_data as $catagory_data_value)
                   <ul id="vg-mainmenu" class="nav menu ">
                   <li class="item-101 current active deeper parent">
                   <a href="/details/{{$catagory_data_value->catagory_name}}" class="txt">{{$catagory_data_value->catagory_name}}</a><div class="n_open_right n_menu_type_2">
                   @php 
                   $sub_catagory_data=DB::table('sub_catagory')->where('sub_catagory_status','Active')->where('catagory_name',$catagory_data_value->catagory_name)->get();
                   @endphp
                   @foreach($sub_catagory_data as $sub_catagory_data_value)
                     <ul class="clearfix">
                       <li class="item-126 active">
                         <a href="/sub_details/{{$sub_catagory_data_value->sub_catagory_name}}" class="txt">{{$sub_catagory_data_value->sub_catagory_name}}</a>
                       </li>
                     </ul>
                   @endforeach
                   </div>
                   </li>
                  </ul>
              @endforeach

													
						<div class="pull-right n_bgcolor n_menu_search_wrapper "><div class="search">
    <form class="n_menu_search" method="post" action="http://67.205.134.99/themes/news24/index.php">
		<input type="text" name="searchword" class="n_menu_search_text" required="" placeholder="Search ...">
		<div class="n_menu_search_submit"></div>
		<input type="hidden" name="task" value="search" />
    	<input type="hidden" name="option" value="com_search" />
    	<input type="hidden" name="Itemid" value="115" />
	</form>
</div></div>
						<!-- In menu search form ends -->
						
					</nav>
