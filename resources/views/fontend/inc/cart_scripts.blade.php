{{--
<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	function addToCart(product_id){
		// alert(product_id);

		$.post( "http://127.0.0.1:8000/cart/add/item",
			{
				id: product_id
			})
		  .done(function( data ) {
              alert('data');
		  	// data = JSON.parse(data);
		    // if(data.status == 'success'){
		    // 	// toast
		    // 	alertify.set('notifier','position', 'top-center');
			// 	alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('cart.page') }}">go to checkout page</a>');

		    // 	$("#totalItems").html(data.totalItems);
		    }
		  });
	}
</script> --}}
