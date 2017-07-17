$(document).ready(function(){

	$("#toggleLogin").click(function(){

		if ($("#loginActive").val() == "1") {
			$("#loginActive").val("0");
			$("#loginModalTitle").html("Sign Up");
			$("#toggleLogin").html("Log In");
			$("#login2").html("Sign Up");

		} else {
			$("#loginActive").val() == "0";
			$("#loginActive").val("1");
			$("#loginModalTitle").html("Log In");
			$("#toggleLogin").html("Sign Up");
			$("#login2").html("Log In");
		}
})

})

$(document).ready(function(){
	$("#login2").click(function(){

		var email = $("#email").val();
		var pwd = $("#password").val();
		var toggle = $("#loginActive").val();

		var dataSent = {mail : email, pass: pwd, active: toggle};

		$.ajax({

			type: "POST",
			url: 'actions.php?action=loginSignup',
			//dataType: 'json',
			data: dataSent,
			success: function(data){

				if (data == "1") {

					window.location.assign('index.php?page=feed');
					
			} else {

				$("#alertError").html(data).show();
			}
		}

	})
})

})

$(document).ready(function(){

	$("#post-btn").click(function(){
              //alert($("#posted").val());


		var story = $("#posted").val();

		$.ajax({

			type: "POST",
			url: 'actions.php?action=postStory',
			data: "posted=" + $("#posted").val(),
			//dataType: 'text',
			success: function(result){

				if (result == '1') {

				$("#posted").val('');
				window.location.assign('index.php?page=feed');


				} else {

					//alert(result);

					$("#alertError").html(result).show();
				}

			}


		 
		});
	})




})

