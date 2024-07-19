<?php
			if(isset($_POST['acao'])){
				$email = trim($_POST['email']);
				$password = md5($_POST['password']);

				require("conexaoPDO.php");

				//$email = mysql_real_escape_string($conexao, $_POST['email']);
				//$password = mysql_real_escape_string($conexao, $_POST['password']);
				$selectUser = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
				$runUser = mysqli_query($conexao, $selectUser) or die(mysqli_error($conexao));
				$verifica = mysqli_num_rows($runUser);
				//echo '<script>alert("'.$verifica.'")</script>';
				if($verifica != 0){
					session_start();
					$_SESSION['optodo'] = $email;
					$SQLLastLogin = mysqli_query($conexao, "UPDATE members SET lastLogin=NOW() WHERE email = '$username'");
					echo '<script>window.location.href="index.php"</script>';
				}else{
					echo '<script>loginAlert();</script>'; //USER NOT EXIST!!!
				}
			}
		?>