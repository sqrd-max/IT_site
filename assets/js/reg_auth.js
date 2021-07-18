$(document).ready(function(){
	$('#reg-btn').click(function(){
		var username = $('#1').val();
		var email = $('#2').val();
		var password = $('#3').val();
		var pass_repeat = $('#4').val();

		var xhr = new XMLHttpRequest();
		var get = '../templates/check.php?username='+username+'&email='+email+'&password='+password+'&pass_repeat='+pass_repeat;	
		xhr.open('GET', get, true);
		xhr.send();

		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4)
				return;
			if(xhr.status == 200){
				$('#error').html(xhr.responseText);
			}
		}

		return false;
	});
	$('#auth-btn').click(function(){
		var login = $('#login').val();
		var pass = $('#pass').val();

		var xhr = new XMLHttpRequest();
		xhr.open('POST', '../templates/auth.php', true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send('login='+login+'&pass='+pass);

		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4)
				return;
			if(xhr.status == 200){
				if(xhr.responseText>0){
					window.location.href="../../index.php";
				}else{
					$('#error').html(xhr.responseText);
				}

				
			}
		}

		return false;
	});
	$('#reg_h').click(function(){
		$('#registration').css('display', 'block');
		$('#autorization').css('display', 'none');
		$('#reg_h').css('color', 'black');
		$('#auth_h').css('color', 'white');
		$('#reg_h').css('color', 'black');
		$('#auth_h').css('color', 'white');
		$('#error').html(' ');
	});
	$('#auth_h').click(function(){
		$('#registration').css('display', 'none');
		$('#autorization').css('display', 'block');
		$('#reg_h').css('color', 'white');
		$('#auth_h').css('color', 'black');
		$('#error').html(' ');
	});
});