	<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Categories</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
						@foreach($all_catagory as $key=>$category)
						@if($key==0)
                    	<li class="first"><a href="{{URL::route('catagory',$category['category_id'])}}">{{$category['name']}}</a></li>
						@elseif($key==$catagory_count-1)
						<li class="last"><a href="{{URL::route('catagory',$category['category_id'])}}">{{$category['name']}}</a></li>
						@else
						<li><a href="{{URL::route('catagory',$category['category_id'])}}">{{$category['name']}}</a></li>
						@endif
						@endforeach
                    </ul>
                </div>
            </div>
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Bestsellers </h3>   
                <div class="content"> 
                @foreach($top_pro as $key => $val) 
                	<div class="bs_box">
                    	<a href="{{URL::to('p/'.$val['id'])}}"><img src="/images/{{$val['image']}}" alt="image" /></a>
                        <h4><a href="{{URL::to('p/'.$val['id'])}}">{{$val['name']}}</a></h4>
                        <p class="price">${{$val['price']}}</p>
                        <div class="cleaner"></div>
                    </div>
                @endforeach
                   
                </div>
            </div>
        </div>