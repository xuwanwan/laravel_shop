
@include('c.head')
@section('body')

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	@include('c.header')
    <div id="templatemo_main">
    	 @include('c.leftboor')
        <div id="content" class="float_r">
        	<h1> Products</h1>
            @foreach($products as $key=>$item)
           <div class="product_box">
                            
                <a href="{{URL::to('p/'.$item->id)}}"><img src="/images/{{$item->image}}" alt="Shoes 1" /></a>
                <p> {{$item->name}}</p>
              <p class="product_price">$ {{$item->price}}</p>
                <a href="shoppingcart.html" class="addtocart"></a>
                <a href="{{URL::to('p/'.$item->id)}}" class="detail"></a>
            </div>
            @if(($key+1)%3==0)
            <div class="cleaner"></div>
            @endif
           @endforeach
              {{ $products->links(); }}
        </div> 
        <div class="cleaner"></div>
       
    </div> <!-- END of templatemo_main -->
    
@include('c.foot')
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

</body>
</html>