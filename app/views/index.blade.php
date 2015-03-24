@include('c.head')

@section('body')

    
  <div id="templatemo_body_wrapper">
   <div id="templatemo_wrapper">
    @include('c.header')
	
    
    <div id="templatemo_main">
        @include('c.leftboor')
        <div id="content" class="float_r">
        	<div id="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <img src="images/slider/02.jpg" alt="" />
                    <a href="#"><img src="images/slider/01.jpg" alt="" title="This is an example of a caption" /></a>
                    <img src="images/slider/03.jpg" alt="" />
                    <img src="images/slider/04.jpg" alt="" title="#htmlcaption" />
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                </div>
            </div>
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        	<h1>New Products</h1>
            @foreach($new_pro as $key => $val) 
            <div class="product_box">
	            <h3></h3>
            	<a href="{{URL::to('p/'.$val->id)}}"><img src="images/{{$val['image']}}" alt="Shoes 1" /></a>
                <p>{{ $val->name}}</p>
                <p class="product_price">${{$val->price}}</p>
                <a href="{{URL::route('addCart',$val->id)}}" class="addtocart"></a>
                <a href="{{URL::to('p/'.$val->id)}}" class="detail"></a>
            </div>
            @endforeach
			<div class="cleaner"></div>
			</div>
		<div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
@include('c.foot')
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->



@section('end')
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/ddsmoothmenu.js') }}
   
@parent @stop
</body>
</html>