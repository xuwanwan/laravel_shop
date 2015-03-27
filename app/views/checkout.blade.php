@include('c.head')

@section('body')

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	@include('c.header')
    
   
    
    <div id="templatemo_main">
        @include('c.leftboor')
        <div id="content" class="float_r">
         <form action='{{URL::route('cart.confim')}}' method='post'>
        	<h2>Checkout</h2>
            <h5><strong>BILLING INFORMATION</strong></h5>
            <div class="content_half float_l checkout">
				firstname  
                  <input type="text"  style="width:300px;" name='firstname'/>
                <br />
                <br />
                lastname  
                  <input type="text"  style="width:300px;" name='lastname'/>
                <br />
                <br />
              Address:
				<input type="text"  style="width:300px;" name='address' />
                <br />
                <br />
              City:
                <input type="text"  style="width:300px;"  name='city'/>
                <br />
                <br />
                Country:
                <input type="text"  style="width:300px;" name='country'/>
            </div>
            
            <div class="content_half float_r checkout">
            	E-MAIL
				<input type="text"  style="width:300px;"  name='email'/>
                <br />
                <br />
          PHONE<br />
				<span style="font-size:10px">Please, specify your reachable phone number. YOU MAY BE GIVEN A CALL TO VERIFY AND COMPLETE THE ORDER.</span>
                <input type="text"  style="width:300px;" name='phone' />
            </div>
            
            <div class="cleaner h50"></div>
            <h3>SHOPPING CART</h3>
            <table width="680px" cellspacing="0" cellpadding="5">
                   	  <tr bgcolor="#ddd">
                        	<th width="220" align="left">Image </th> 
                        	<th width="180" align="left">Description </th> 
                       	  	<th width="100" align="center">Quantity </th> 
                        	<th width="60" align="right">Price </th> 
                        	<th width="60" align="right">Total </th> 
                        	<th width="90"> </th>
                            
                      </tr>
                      @foreach($cart_data as $cart)
                    	<tr>
                        	<td><img src="images/product/01.jpg" alt="image 1" /></td> 
                        	<td>{{$cart->name}}</td> 
                            <td align="center">{{$cart->goods_number}}</td>
                            <td align="right">{{$cart->price}}</td> 
                            <td align="right">{{$cart->price*$cart->goods_number}} </td>
                            
						</tr>
                        @endforeach
      
					</table>
            <h4>TOTAL AMOUNT: <strong>{{$cart_total}}</strong></h4>
			<p><input type="checkbox" />
			I accept the <a href="#">terms of use</a> of this website.</p>
            <table style="border:1px solid #CCCCCC;" width="100%">
                <tr>
                    <td><input type="radio" name="payment_code" value='pp_standend'</td>
                    <td height="80px"> <img src="images/paypal.gif" alt="paypal" /></td>
                    <td width="400px;" style="padding: 0px 20px;">Recommended if you have a PayPal account. Fastest delivery time.
                    </td>
                    <td><a href="#" class="more">PAYPAL</a></td>
                </tr>
                <tr>
                    <td><input type="radio" name="payment_code" value='wxpay'</td>
                    <td  height="80px"><img src="images/2co.gif" alt="paypal" />
                    </td>
                    <td  width="400px;" style="padding: 0px 20px;">2Checkout.com, Inc. is an authorized retailer of goods and services. 2CheckOut accepts customer orders via online checks, Visa, MasterCard, Discover, American Express, Diners, JCB and debit cards with the Visa, Mastercard logo. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a>.</td>
                    <td><a href="#" class="more">2CHECKOUT</a></td>
                </tr>
            </table>
        </div>
        <div><input type='submit' value='checkout'></div> 
    </form>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   @include('c.foot')
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

</body>
</html>