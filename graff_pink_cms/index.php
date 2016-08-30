<?php session_start();
	include 'includes/db.php';
		$login_err = '';
	if(isset($_GET['login_error'])){
		if($_GET['login_error'] == 'empty'){
			$login_err = '<div class="alert alert-danger">User name or Password was empty!</div>';
		}elseif($_GET['login_error'] == 'wrong'){
			$login_err = '<div class="alert alert-danger">User name or Password was Wrong!</div>';
		}elseif($_GET['login_error'] == 'query_error'){
			$login_err = '<div class="alert alert-danger">There is somekind of Database Issue!</div>';
		}
	}
	
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Graff pink</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
		
		<!--============ IE FIX==============-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--==============FIRST MOBILE=============-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Admin Panel Responsive, Bootstrap, Flat Web Design, Android Compatible, Smartphone Compatible, webdesigns" />
 

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/full-slider.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <?php include 'header.php';?>

		
		<!-- Start Parallax -->
		<div id="myCarousel" class="carousel slide Parallax">
			
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
			</ol>

			<!-- Wrapper for Slides -->
            <div class="carousel-inner">
               
                <div class="item active">
					<!-- Set the first background image using inline CSS below. -->
					<div class="fill change-img-slider1"></div>
					<div class="carousel-caption">
						<h2>Welcome To Pink</h2>
						<p>A multi purpose theme from cssauthor.com</p>
					</div>
				</div>	
                
                
                 <?php
                $sel_sql = "SELECT * FROM slide";
                $run_sql = mysqli_query($conn,$sel_sql);
                while($rows = mysqli_fetch_assoc($run_sql)){
                       echo '
                       
                       <div class="item">
					<!-- Set the second background image using inline CSS below. -->
					<div class="fill" style="background: url('.$rows['image'].') center no-repeat ;
	background-size: cover; "></div>
					<div class="carousel-caption">
						<h2>Welcome To Pink</h2>
                        <p>'.substr($rows['title'],0,100).'</p>
					</div>
				</div>
                       
                       ';
                }
            ?>
                
                
				
				
				<!-- end carousel-inner -->

			<!-- Controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="icon-prev" style="font-size: 70px"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="icon-next" style="font-size: 70px"></span>
			</a>
		</div><!-- end parallax -->
		<!-- End Parallax -->
		
		<div class="clr"></div><!-- end clr -->
		
		<!-- Start Intro -->
		<div id="intro" class="intro"><div class="container">
				<div class="head-intro">
                    
                    <?php
						$sel_sql = "SELECT * FROM about";
						$run_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
							echo '
                    
                                <h2>'.$rows['a_title'].'</h2>
								<p>'.substr($rows['a_content'],0,190).'...</p>
                    
							';
						}
					?>
					
                    
                    
				</div><!-- end head-intro -->
				
				<div class="row">
					
						<div class="col-md-3 col-sm-6 text-center">
							<div class="circle1">
								<div class="icon">
									<img src="img/icon1.png" alt="">
									<h5>Tickets</h5>
									
								</div><!-- end icon -->
								<div class="layer-two">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 	
									</p>
								</div><!-- end layer-two -->
							</div><!-- end circle -->
						</div>
						
						<div class="col-md-3 col-sm-6 text-center">
							<div class="circle2">
								<div class="icon">
									<img src="img/icon2.png" alt="">
									<h5>Camera</h5>
								</div><!-- end icon -->
								<div class="layer-two">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 	
									</p>
								</div><!-- end layer-two -->
							</div><!-- end circle -->
						</div>
						
						<div class="col-md-3 col-sm-6 text-center">
							<div class="circle3">
								<div class="icon">
									<img src="img/icon3.png" alt="">
									<h5>Beer</h5>
									
								</div><!-- end icon -->
								<div class="layer-two">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 	
									</p>
								</div><!-- end layer-two -->
							</div><!-- end circle -->
						</div>
						
						<div class="col-md-3 col-sm-6 text-center">
							<div class="circle4">
								<div class="icon">
									<img src="img/icon4.png" alt="">
									<h5>Devices</h5>
								</div><!-- end icon -->
								<div class="layer-two">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 	
									</p>
								</div><!-- end layer-two -->
							</div><!-- end circle -->
						</div>
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end intro -->
		<!--End Intro -->
		
		<div class="clr"></div><!-- end clr -->
		
		<!-- Start content -->
		<div class="content" id="Services">
			<div class="container">
				<div class="row">
					<div class="col-md-11 left-margin">
                        
                        <?php
						$sel_sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY id DESC";
						$run_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
							echo '
                        
						<div class="col-md-3">
							<div class="image-content">
                                <img src="'.$rows['image'].'"  style="width: 199px; height: 132px" alt="">
							</div><!-- end image-content -->
						</div><!-- end col-md-3 -->

						<div class="col-md-9">
							<div class="content-words">
                                <h3>'.$rows['title'].'</h3>
								<p>'.substr($rows['description'],0,400).'....</p>
							</div><!-- end content-words -->
						</div><!-- end col-md-9 -->
							';
						}
					?>
                    </div><!-- end col-md-11 -->
				</div><!-- end row -->
			</div><!--end container -->
		</div><!-- end content -->
		<!-- End content -->
		
		<div class="clr"></div><!-- end clr -->
		
		<?php include 'footer.php';?>
					
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/temp.js"></script>
		<script>
			$('.carousel').carousel({
				interval: 5000 //changes the speed
			})
    </script>
	</body>
</html>
