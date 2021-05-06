<?php
require "header.php";
if (session_status() == PHP_SESSION_NONE) {
	session_start();
  }
?>
		
	<div class="hero-wrap js-fullheight" style="background-image: url('images/bg11.jpg');">
     <!-- <div class="overlay"></div> -->
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        	<h3 class="v">Antique Oyster</h3>
        	<h3 class="vr">Since - yyyy</h3>
          	<div class="col-md-11 ftco-animate text-center">
            <h2><b><span>Wear Your Confidence</span></b></h2>
        </div>
          	<div class="mouse">
				<a class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
				</a>
			</div>
        </div>
      </div>
    </div>

    <div class="goto-here"></div>
    
	<?php 
	 include "product.php";
	?>

	<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/indexa.jpg);">
						<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-5 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Antique <br>Oyster <br> <span>Jewelries</span></h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
							<p>Antique Oyster has made it their mission to strive every day to earn the confidence and trust of our clients by meeting and exceeding their expectations of quality, service, and unsurpassed value. We ensure our actions are consistent with our Corporate Values, enabling us to maintain the relationships and reputation with our Clients.

The foundation of a business and the basis on which our company has grown; an emphasis on personalization and strong ties to our clients, industry, and communities. Antique Oyster provides our clients with more than they imagined, for less than they anticipate. We offer the finest items – well manufactured, well designed, properly represented by a knowledgeable staff, and beautifully wrapped – regardless the budget.

We will continually enhance the value of our Brand by being foremost in the minds of people looking to commemorate life’s events, and providing an exceptional experience for our clients, associates, and communities in order to build long term relationships.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
    	<div class="container">
    		<div class="row justify-content-center py-5">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>Partner</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Awards</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section bg-light ftco-services">
    	<div class="container">
    		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h1 class="big">Services</h1>
            <h2>We want you to express yourself</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-002-recommended"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Refund Policy</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-001-box"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Premium Packaging</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-003-medal"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
        </div>
    	</div>
    </section>

<?php
include "footer.php";

?>
    
  </body>
</html>