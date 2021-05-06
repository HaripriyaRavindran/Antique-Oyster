
<?php
session_start();
	include "header.php";
	include "database.php";
    $msg = "SELECT * FROM `products`";
?>

<link rel="stylesheet" href="css/check.css">
<section id="mainsession" class="ftco-section bg-light">
    <div class="container">
		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Products</h1>
            <h2 class="mb-4">Our Products</h2>
          </div>
        </div>    		
    </div>
    	<div class="container-fluid" >
            <div class="row" >

                <div class="col-md-3">
                    <div id="sidemain" class="productsingle side">
                        <div class="row">
                            <H1 class="col-6 mainlabel ">FILTERS</H1>
                            <div class="col-6">
                                <h4 class="plus hiddenplus" id="hiddenplus" onclick="clicksmain(this,0)">+</h4>
                                <div id="clearall">
                                    <h6 id="hiddenclearplus" onclick="clearall(this)">Clear all</h6>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="sliderdivmain" class="hiddendiv">
                                    <div id="clearall">  
                                        <h6 id="hiddencleardiv" onclick="clearall(this)">Clear all</h6>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="row">
                                        <!-- new option 0-->
                                        
                                        <div class="col-6">
                                            <h3 class="filterOptions">Sort By</h3>
                                        </div>
                                        <div class="col-6 ">
                                            <h4 class="plus" onclick="clicks(this,0)">+</h4>
                                        </div>
                                    
                                        <div class="col-12">
                                            <div id="sliderdiv">
                                            
                                                <div class="col-12">
                                                    <div class="containercheck">
                                                    
                                                        <ul class="ks-cboxtags">
                                                                        
                                                            <div class="col-12">
                                                                <li><input type="radio" id="radioOne" name="radiosort" value="bestsellers" onclick="checkboxclick(this)"><label for="radioOne">Best Sellers</label></li>
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="radio" id="radioTwo" name="radiosort" value="newarrivals" onclick="checkboxclick(this)"><label for="radioTwo">New Arrivals</label></li>                                                          
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="radio" id="radioThree" name="radiosort" value="popularity" onclick="checkboxclick(this)"><label for="radioThree">Popularity</label></li>                                                      
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="radio" id="radioFour" name="radiosort" value="discount" onclick="checkboxclick(this)"><label for="radioFour">Discount</label></li>                                                            
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="radio" id="radioFive" name="radiosort" value="lowtohigh" onclick="checkboxclick(this)"><label for="radioFive">Price: Low to High</label></li>                                                           
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="radio" id="radioSix" name="radiosort" value="hightolow" onclick="checkboxclick(this)"><label for="radioSix">Price: High to Low</label></li>                                                           
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        
                                        <!-- end option 0 -->

                                        <!-- new option 1-->    
                                        <div class="col-6">
                                            <h3 class="filterOptions">Jewellery Type</h3>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="plus" onclick="clicks(this,1)">+</h4>
                                        </div>
                                        <div class="col-12">
                                            <div id="sliderdiv">
                                                <div class="col-12">
                                                    <div class="containercheck">
                                                    
                                                        <ul class="ks-cboxtags">
                                                            <li><input type="checkbox" name="checkcat" id="checkboxOne" value="Gold" onclick="checkboxclick(this)"><label for="checkboxOne">Gold</label></li>
                                                            <li><input type="checkbox" name="checkcat" id="checkboxTwo" value="Silver"  onclick="checkboxclick(this)"><label for="checkboxTwo">Silver</label></li>
                                                            <li><input type="checkbox" name="checkcat" id="checkboxThree" value="Ceramic"  onclick="checkboxclick(this)"><label for="checkboxThree">Ceramic</label></li>
                                                            <li><input type="checkbox" name="checkcat" id="checkboxFour" value="Oxidized" onclick="checkboxclick(this)"><label for="checkboxFour">Oxidized</label></li>
                                                            <li><input type="checkbox" name="checkcat" id="checkboxFive" value="Platinum" onclick="checkboxclick(this)"><label for="checkboxFive">Platinum</label></li>
                                                            <li><input type="checkbox" name="checkcat" id="checkboxSix" value="Rose-gold"  onclick="checkboxclick(this)"><label for="checkboxSix">Rose Gold</label></li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <!-- end option 1 -->

                                        <!-- new option 2 -->
                                        <div class="col-6">
                                            <h3 class="filterOptions">Product</h3>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="plus" onclick="clicks(this,2)">+</h4>
                                        </div>
                                        <div class="col-12">
                                            <div id="sliderdiv">
                                                <div class="col-12">
                                                    <div class="containercheck">
                                                    
                                                        <ul class="ks-cboxtags">
                                                            <li><input type="checkbox" name="checkpro" id="checkbox1" value="Rings" onclick="checkboxclick(this)"><label for="checkbox1">Rings</label></li>
                                                            <li><input type="checkbox" name="checkpro" id="checkbox2" value="Ear-rings" onclick="checkboxclick(this)"><label for="checkbox2">Ear-rings</label></li>
                                                            <li><input type="checkbox" name="checkpro" id="checkbox3" value="Bracelet" onclick="checkboxclick(this)"><label for="checkbox3">Bracelet</label></li>
                                                            <li><input type="checkbox" name="checkpro" id="checkbox4" value="Pendant" onclick="checkboxclick(this)"><label for="checkbox4">Pendant</label></li>
                                                            <li><input type="checkbox" name="checkpro" id="checkbox5" value="Jewellery-set" onclick="checkboxclick(this)"><label for="checkbox5">Jewellery Set</label></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <!-- end option 2 -->

                                    
                                        <!-- new option 3-->
                                        <div class="col-6">
                                            <h3 class="filterOptions">Price</h3>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="plus" onclick="clicks(this,3)">+</h4>
                                        </div>
                                        <div class="col-12">
                                            <div id="sliderdiv">
                                                <div class="col-12">
                                                    <div class="containercheck">
                                                        <ul class="ks-cboxtags">
                                                            <div class="col-12">
                                                                <li ><input type="checkbox" name="checkprice" id="checkboxPrice1" value="5000" onclick="checkboxclick(this)"><label for="checkboxPrice1">LESS THAN ₹5000</label></li>
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="checkbox" name="checkprice" id="checkboxPrice2" value="10000" onclick="checkboxclick(this)"><label for="checkboxPrice2">₹5000 & ₹10000</label></li>
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="checkbox" name="checkprice" id="checkboxPrice3" value="20000" onclick="checkboxclick(this)"><label for="checkboxPrice3">₹10000 & ₹20000</label></li>
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="checkbox" name="checkprice" id="checkboxPrice4" value="30000" onclick="checkboxclick(this)"><label for="checkboxPrice4">₹20000 & ₹30000</label></li>
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="checkbox" name="checkprice" id="checkboxPrice5" value="40000" onclick="checkboxclick(this)"><label for="checkboxPrice5">₹30000 & ₹40000</label></li>
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="checkbox" name="checkprice" id="checkboxPrice6" value="50000" onclick="checkboxclick(this)"><label for="checkboxPrice6">₹40000 & ₹50000</label></li>
                                                            </div>
                                                            <div class="col-12">
                                                                <li><input type="checkbox" name="checkprice" id="checkboxPrice7" value="MORE" onclick="checkboxclick(this)"><label for="checkboxPrice7">₹50000 & MORE</label></li>
                                                            </div>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <!-- end option 3 -->

                                        

                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    
                    
                    
                </div>

                <script>
                    jQuery(document).ready(function($) {
                    var alterClass = function() {
                        var ww = document.body.clientWidth;
                        if (ww < 600) {
                            document.getElementById("hiddenplus").classList.remove("hiddenplus");
                            document.getElementById("hiddenclearplus").classList.add("hiddenclear");
                            document.getElementById("hiddencleardiv").classList.remove("hiddenclear");
                            document.getElementById("sidemain").style.marginBottom = "0px";
                            try {
                                document.getElementById("hiddendiv").id = "sliderdivmain";
                            } catch (error) {
                                // noting
                                console.log("");
                            }
                            $( ".side #sliderdivmain" ).hide();
                        } else if (ww >= 601) {
                            document.getElementById("hiddenclearplus").classList.remove("hiddenclear");
                            document.getElementById("hiddencleardiv").classList.add("hiddenclear");
                            document.getElementById("hiddenplus").classList.add("hiddenplus");
                            $( ".side #sliderdivmain" ).slideDown( "slow" );
                            document.getElementById("sliderdivmain").id = "hiddendiv";

                        };
                    };
                    $(window).resize(function(){
                        alterClass();
                    });
                    //Fire it when the page first loads:
                    alterClass();
                    });
                    var clears = "0"; 
                    var radio = "";
                    var checkcat = [];
                    var checkpro = [];
                    var checkprice = [];
                    
                    function clearall(main) {
                        clears="1";
                        $(document).ready(function() {
                            $(':checkbox').each(function() {
                                this.checked = false;
                            });
                            $(':radio').each(function() {
                                this.checked = false;
                            });
                        });
                        checkboxclick(clears);
                    }
                    function clicksmain(b,a) {
                        var ww = document.body.clientWidth;
                        if ( $( ".side #sliderdivmain:eq("+a+")" ).is( ":hidden" ) ) {
                            b.classList.add("rotateplusclock");
                            b.classList.remove("rotateplusanti");
                            if (ww < 600) {
                                document.getElementById("sidemain").style.marginBottom = "10%";
                            }
                            $( ".side #sliderdivmain:eq("+a+")" ).slideDown( "slow" );
                        } else {
                            b.classList.remove("rotateplusclock");
                            b.classList.add("rotateplusanti");
                            
                            $( ".side #sliderdivmain:eq("+a+")" ).slideUp( "slow" );
                            if (ww < 600) {
                                document.getElementById("sidemain").style.marginBottom = "0px";
                            }
                        }
                    }
                    function clicks(b,a) {
                        if ( $( ".side #sliderdiv:eq("+a+")" ).is( ":hidden" ) ) {
                            b.classList.add("rotateplusclock");
                            
                            
                            b.classList.remove("rotateplusanti");
                            $( ".side #sliderdiv:eq("+a+")" ).slideDown( "slow" );
                        } else {
                            b.classList.remove("rotateplusclock");
                            b.classList.add("rotateplusanti");
                            
                            $( ".side #sliderdiv:eq("+a+")" ).slideUp( "slow" );
                        }
                    }
                    
                    function checkboxclick(element) {
                        try {
                            if(element=="1"){
                                name = "1";
                            }
                            else{
                                var name= element.name;
                            }

                        } catch (error) {
                            var name = element;
                        }
                        // console.log(radio,checkcat,checkpro,checkprice);
                        if(name == "radiosort"){
                            radio = element.value; //override
                        }
                        else if(name == "checkcat"){
                            if (element.checked == true){
                                checkcat.push( element.value);
                            } else {
                                checkcat.splice(checkcat.indexOf(element.value), 1);
                            }
                        }
                        else if(name == "checkpro" ){
                            if (element.checked == true){
                                checkpro.push( element.value);
                            } else {
                                checkpro.splice(checkpro.indexOf(element.value), 1);
                            }
                        }
                        else if(name == "checkprice"){
                            if (element.checked == true){
                            checkprice.push( element.value);
                            } else {
                                checkprice.splice(checkprice.indexOf(element.value), 1);
                            }
                        } 
                        if (name == "1") {
                            radio = "";
                            while(checkcat.length > 0) {
                                checkcat.pop();
                            }
                            while(checkpro.length > 0) {
                                checkpro.pop();
                            }
                            while(checkprice.length > 0) {
                                checkprice.pop();
                            }
                        }
                        // str=checkpro[0];
                        var str =[];
                        var dbParam = "";
                        if (radio != "" || checkcat.length !=0 ||   checkpro.length != 0 || checkprice.length != 0 || name == "1") { 
                                str = {"radio":radio,"product":checkpro,"category":checkcat,"price":checkprice,"clears":clears}; 
                                clears="0"; 
                                dbParam = JSON.stringify(str); 
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("here").innerHTML = this.responseText;
                                    }
                                };
                                xmlhttp.open("GET", "testing.php?x="+dbParam, true);
                                xmlhttp.send();                             
                            }
                        console.log(radio,checkcat,checkpro,checkprice);
                    }
                </script>
                
                <div id="refresh" class="col-md-9">
                    <div id ="here" class="row">
                    <?php 
                        $ctr = 0;
                        $cont = 1;
                        $getcardtl = mysqli_query($conn,"SELECT * FROM `products`")or die(mysqli_error($conn));

                        while ($fcar = mysqli_fetch_array($getcardtl)) {
                            $a = $fcar["product_id"];
                            $getimg = mysqli_query($conn, "SELECT * FROM `productimages` where product_id = $a")or die(mysqli_error($conn));
                            $pi = mysqli_fetch_array($getimg);                    
 
  
                    ?>
                        <div class="col-sm-6 col-md-4 maingap animated fadeIn">
                            <div class="product productsingle gap">
                                <a href="single.php?id=<?php echo $fcar["product_id"];?>" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi["image"];?>" alt="Image"></a>
                                <div class="text py-3 px-3">
                                    <h3><a href="single.php?id=<?php echo $fcar["product_id"];?>" class="img-prod"><?php echo $fcar['product_name'];?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span><?php echo $fcar["product_price"];?></span></p>
                                        </div>
                                        <div class="rating">
                                            <p class="text-right">
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="bottom-area d-flex">
                                        <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                        <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    <?php
                        }
                    ?>

`                   </div>
    	        </div>
    	    </div>
    	</div>
    </section>

   <?php
    include "footer.php";
    ?>
    
    