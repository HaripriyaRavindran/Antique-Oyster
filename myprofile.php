<?php
	include "header.php";
	include "database.php";	
    $id=$_SESSION["userid"];
    $sql="SELECT * FROM `login` where `user_id`=$id";
    $res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	
?>
<style>
    .card {

    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 50%;
    margin-left:25%;
    background-color: white;
    top:100px;
    margin-bottom: 8%;
    }
  .main{
      border-radius:20px;
      background-color:#f8f9fa;
      margin:10px;
      border:1px solid;
      padding:20px
  }
  .content-side{
    float: left;
    width: 75%;
    padding-top:10px;
    padding-left: 20px;
  }
  .button-side{
    float: left;
    width: 25%;
    padding-top:25px;
    padding-left: 10%;
  }  
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  @media(max-width:990px){
    .card{
        margin: 10px;
        width: 90%;
    }
    .main{
        
    }
    
    }
</style>

<div class="card">
    <div class="main">
        <tr>
        <div class="row">
            <div class="content-side">
                <div class="card-title">Name:</div>
                    <p class="card-body"><?php echo $row['fname']."&nbsp;" .$row['lname']?></p>
            </div>
            <div class="button-side">
                <button class="btn btn-primary">Edit</button>    
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="content-side">
                <div class="card-title">Email:</div>
                <p class="card-body"><?php if ($row['email']==NULL){
                                           echo "<i>No email provided</i>";
                                       }
                                       else{
                                           echo $row['email'];
                                       }?> </p>
            </div>
            <div class="button-side">
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="content-side">
            <div class="card-title">Phone no:</div>
                <p class="card-body"><?php if ($row['phone']==0){
                                           echo "<i>No Contact provided</i>";
                                       }
                                       else{
                                           echo $row['phone'];
                                       }?></p>
                
            </div>
            <div class="button-side">
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="content-side">
            <div class="card-title">Password:</div>
                <p class="card-body">****</p>
            </div>
            <div class="button-side">
                <button class="btn btn-primary" onclick="window.location='resetcust.php'">Reset</button>
            </div>
        </div>
    </div>
    
</div>

<?php

include "footer.php";
?>