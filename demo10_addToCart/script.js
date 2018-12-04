function loadCart(){
	$.get("loadcart.php",function(data){

		$("#loadcart").html(data);

	});
}



$(document).ready(function(){

	loadCart();
});


function changeNoItems(id){


	let items =	$("#quantity" + id).val();
	let price = $("#price" + id).text();
	let newPrice = items * price;
	let grandtotal = items * newPrice;

	$.post("updateCart.php",{id:id,quantity:items},function(data){
		console.log(data);
	})

	$("#subTotal" + id).text(newPrice);

	let a =0;
	$(".sub-total").each(function(id) {
		a = a + parseFloat($(this).text());
		console.log(a);
	});
	$("#grandTotal").text(a);

	// let sum = 0;

	// $.each(a, function(index, value){
	// 	sum += value;
	// });
	// console.log(sum);
 // 	$("#grandTotal").text(sum);


 }

 function deleteItem(id){

 		let ans = confirm("are you sure");
 		if(ans){
		 	$.ajax({
				url:"remove_item.php",
				method:"POST",
				data:{itemId:id},
				dataType:"text",
				success:function(data){
					$('a[href="cart.php"]').html(data);
					console.log(data);
					loadCart();
				}
			})	
 		}
 }

 function checkOut(email)
 	{
 		$.post("checkout.php",{email:email},function(data){

 		})
 }

