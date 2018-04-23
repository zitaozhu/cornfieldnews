<!DOCTYPE html>

<html>
	<head>
		<title>Register</title>
		<style type="text/css">
			.main_wrapper{
				margin: 0 auto;
				width: 1000px;
			}
			a {
				text-decoration: none: 
			}

			body{
				background-color: #ccc;
			}
			header nav{
				width: 100%;
				height: 60px;
				background-color: #fff;
			}
			header nav ul{
				float: left;
				list-style: none;
			}
			header nav ul li{
				float: left;
				list-style: none;
			}
			header nav ul li a{
				font-family: arial；
				font-size: 16px;
				color: #111;
				line-height: 63px;
				list-style: none;
			}
			header .nav-login{
				float:right;
			}
			header .nav-login form{
				float:right;
				padding-top: 15px;
			}
			header .nav-login form input{
				float:left;
				width: 140px;
				height: 30px;
				padding: 0px 10px;
				margin-right: 10px;
				border: none;
				background-color: #ccc;
				font-family: arial；
				font-size: 16px;
				color: #111;
				line-height: 30px;
			}
			header .nav-login form button {
				float:left;
				width: 60px;
				height: 30px;
				margin-right: 10px;
				border: none;
				background-color: #f3f3f3;
				font-family: arial；
				font-size: 16px;
				color: #111;
				cursor: pointer;
			}
			header .nav-login form button:hover {
				background-color: #ccc;
			}
			header .nav-login a {
				display: block;
				width: 60px;
				height: 60px;
				float: left;
				border: none;
				background-color: #fff;
				font-family: arial；
				font-size: 16px;
				color: #111;
				line-height: 63px;
				cursor: pointer;
			}
			.main-container h2{
				font-family: arial；
				font-size: 40px;
				color: #111;
				line-height: 50px;
				text-align: center;
			}

			/*sighup.php*/
			.addusers-form{
				width: 400px;
				margin: 0 auto;
				padding-top: 30px;
			}
			.addusers-form input{
				width: 90%;
				height: 40px;
				padding: 0px 5%;
				margin-bottom: 4px;
				border: none;
				background-color: #fff;
				font-family: arial；
				font-size: 16px;
				color: #111;
				line-height: 40px;
			}
			.addusers-form .input_content input{
				width: 90%;
				height: 40px;
				padding: 0px 5%;
				margin-bottom: 4px;
				border: none;
				background-color: #fff;
				font-family: arial；
				font-size: 16px;
				color: #111;
				line-height: 200px;
			}
			.addusers-form button{
				display: block;
				margin: 0 auto;

				width: 30%;
				height: 40px;
				border: none;
				background-color: #222;
				font-family: arial；
				font-size: 16px;
				color: #fff;
				cursor: pointer;
			}	
			.addusers-form button: hover{
				background-color: #111;
			}



		</style>
	</head>

	<body> 
		<header>
			<nav>
				<div class = "main_wrapper">
					<ul>
						<li><a href="index.html">Home</a></li>
					</ul>
					<!--<div class = "nav-login">
						<form>
							<input type="text" name="user_logid" placeholder="Username">
							<input type="password" name="user_pwd" placeholder="password">
							<button type = "submit" name="submit">Login</button>
						</form>
						<a href="sigh">
					</div>-->
				</div>
			</nav>
		</header>

		<section class = "main-container">
			<div class = "main_wrapper">
				<h2>Register</h2>
					<!--<form class = "addusers-form" action= "include/addusers.inc.php" method = "GET">-->
					<!--	<input type="text" name="username" placeholder="Your Name">-->
					<!--	<input type="text" name="email" placeholder="Email Address">-->
					<!--	<input type="text" name="password" placeholder="Password">-->
					<!--	<input type="text" name="interestCategories" placeholder="Interest Categories">-->
						
					<!--	<button type = "submit" name="submit">Submit</button>-->
					<!--</form>-->
					<form class = "signup-form" action= "include/signup.inc.php" methos = "POST">
						<input type="text" name="first" placeholder="Firstname">
						<input type="text" name="last" placeholder="Lastname">
						<input type="text" name="email" placeholder="E-mail">
						<input type="text" name="username" placeholder="Username">
						<input type="text" name="userpassword" placeholder="Password">
						<!--  <input type="text" name="interestCategories" placeholder="Interest Categories">-->
						Interest Categories:<select name="interestCategories", placeholder="Interest Categories">
                                    <option value = 'politics'>Politics</option>
                                    <option value = 'finance'>Finance</option>
                                    <option value = 'environment'>Environment</option>
                                    <option value = 'sport' selected>Sport </option>
                                    </select>
                                    <br/>  
                                    
						<button type = "submit" name="Submit">Sign up</button>
					</form>
			</div>
		</section>

		
		



	</body>
	






</html>