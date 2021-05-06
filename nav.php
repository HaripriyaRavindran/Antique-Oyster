  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
	<link rel="stylesheet" href="css/nav.css"> 
	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    
		<nav>
			<div class="menu-icon">
				<i class="fa fa-bars fa-2x"></i>
			</div>
			<div class="navlogo">
				LOGO
			</div>
			<div class="menu">
				<ul> 
					<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</nav>
    
	
	<script>
		 $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      });
    </script>
