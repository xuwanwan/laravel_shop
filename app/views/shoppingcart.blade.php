@include('c.head')

@section('body')

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	@include('c.header')

    
    <div id="templatemo_main">
        @include('c.leftboor')
        <div id="content" class="float_r">
        	<h1>Shopping Cart</h1>
            <div>{{$message = Session::get('success')}}</div>
            <form action='{{URL::route('cart.update')}}' method='post' id='cart_form'> 
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
                            <td align="center"><input type="text" value="{{$cart->goods_number}}" style="width: 20px; text-align: right" name='goods_number[]'/> </td>
                            <td align="right">{{$cart->price}}</td> 
                            <td align="right">{{$cart->price*$cart->goods_number}} </td>
                            <td align="center"> 
                                <input type="hidden" name='key[]' value='{{$cart->rec_id}}'>
                                <a href="{{URL::route('cart.remove',$cart->rec_id)}}"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a> </td>
						</tr>
                        @endforeach
                        
                        <tr>
                        	<td colspan="3" align="right"  height="30px">Have you modified your basket? Please click here to <a href="javascript:$('#cart_form').submit()"><strong>Update</strong></a>&nbsp;&nbsp;</td>
                            <td align="right" style="background:#ddd; font-weight:bold"> Total </td>
                            <td align="right" style="background:#ddd; font-weight:bold">{{$cart_total}} </td>
                            <td style="background:#ddd; font-weight:bold"> </td>
						</tr>
					</table>
            </form>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
					<p><a href="checkout.html">Proceed to checkout</a></p>
                    <p><a href="javascript:history.back()">Continue shopping</a></p>
                    	
                    </div>
			</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
@include('c.foot')
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

</body>
</html>