<input type="text" id="email" placeholder="email">
<p id="result"></p>

<input type="submit" class="btn" id="submit">Submit</input> 



    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


<script type="text/javascript">


	
	$('input[type="submit"]').keyup(function(){

		let email = $(this).val();
		// console.log(email);

		$.post("demo8.php", {email:email}, function(data){
		
			$("#result").html(data);
			
		})
	});




	



</script>