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