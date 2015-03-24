@include('c.head')
@section('body')

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	@include('c.header')
    
    <div id="templatemo_main">
    	@include('c.leftboor')
        <div id="content" class="float_r">
        	<h1>Product Detail</h1>
            <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" href="/images/{{$product_info->image}}"><img src="/images/{{$product_info->image}}" alt="image" /></a>
            </div>
            <div class="content_half float_r">
                <table>
                    <tr>
                        <td width="160">Price:</td>
                        <td>${{$product_info->price}}</td>
                    </tr>
                    <tr>
                        <td>Availability:</td>
                        <td>@if($product_info->stock_status_id==5)
                              In Stock
                              @else
                              Out Stock
                              @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Model:</td>
                        <td>{{$product_info->model}}</td>
                    </tr>
                    <tr>
                        <td>Manufacturer:</td>
                        <td>Apple</td>
                    </tr>
                    <tr>
                    	<td>Quantity</td>
                        <td><input type="text" value="1" style="width: 20px; text-align: right" /></td>
                    </tr>
                </table>
                <div class="cleaner h20"></div>

                <a href="shoppingcart.html" class="addtocart"></a>

			</div>
            <div class="cleaner h30"></div>
            
            <h5>Product Description</h5>
            <p>{{$product_info->description}}</p>	
            
          <div class="cleaner h50"></div>
            
            <h3>Related Products</h3>
        	<div class="product_box">
            	<a href="productdetail.html"><img src="images/product/01.jpg" alt="" /></a>
                <h3>Ut eu feugiat</h3>
                <p class="product_price">$ 100</p>
                <a href="shoppingcart.html" class="addtocart"></a>
                <a href="productdetail.html" class="detail"></a>
            </div>        	
            <div class="product_box">
            	<a href="productdetail.html"><img src="images/product/02.jpg" alt="" /></a>
                <h3>Curabitur et turpis</h3>
                <p class="product_price">$ 200</p>
                <a href="shoppingcart.html" class="addtocart"></a>
                <a href="productdetail.html" class="detail"></a>
            </div>        	
            <div class="product_box no_margin_right">
            	<a href="productdetail.html"><img src="images/product/03.jpg" alt="" /></a>
                <h3>Mauris consectetur</h3>
                <p class="product_price">$ 120</p>
                <a href="shoppingcart.html" class="addtocart"></a>
                <a href="productdetail.html" class="detail"></a>
            </div>     
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">About</a> | <a href="#">FAQs</a> | <a href="#">Checkout</a> | <a href="#">Contact Us</a>
		</p>

		Copyright © 2072 <a href="#">Your Company Name</a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    	
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

</body>
</html>