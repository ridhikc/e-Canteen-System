<?php #include "logout.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
  .navbar{
    color: floralwhite;
    border-radius: 0%;
  }
  .hbold1{
    font-weight:800;
  }
  .col-sm-4{
      margin-bottom:20px;
      margin-top:27px;
      margin-left:70px;
      
  }

</style>
<body style=" background-color:black;" >
     <div class="container-fluid" style="background-color:black ;" >
       <div class="well well-sm" style="background-color:black; border-color: black;">
         <h1 class="text-center" style="color:floralwhite"><span class="glyphicon glyphicon-cog"></span> ADMIN PANEL</h1>
       </div>
     </div>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin.php">ADMIN PANEL</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">FOOD STATISTICS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">A-Block Canteen</a></li>
          <li><a href="#">F-Block Canteen</a></li>
          <li><a href="#">J-Block Canteen</a></li>
        </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a  href="admin.php?out=true"><span class="glyphicon glyphicon-log-out"></span>LOG OUT</a></li>
    </ul>

  </div>
</nav>


<!--1,2-->

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <div class="well well-lg" >
        <form action="" method="post">
          
        <h4 class="hbold1">MANAGE CANTEEN :</h4>
        <br>
        <div class="row">
           <div class="col-sm-5">
           <div class="form-group">
         <label>CANTEEN:</label>
              
           <?php 

            $query="SELECT * FROM canteen";
           # $result=mysqli_query($connect,$query);
            echo "<select class='form-control' name='canteen'>";
            while($row = mysqli_fetch_assoc($result))
              {
                  $id=$row['canteen_name'];
                  echo "<option value='" .$id. "'>" .$id. "</option>";    
              }
            echo "</select>";
            ?>
            </div>
           
           </div>
        </div>
    
         <br>

          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
              <label for="status">STATUS:</label>
              <select class='form-control' name='status' id='status'>
                <option value=1>Open</option>
                <option value=0>Close</option>
              </select>
            </div>
            </div>
         </div>
      
    
        <?php
           # include "php_functions.php";
            if(isset($_POST['change_status']))
            {
              change_canteen_status($_POST['status'],$_POST['canteen']);
            }
          
        ?>
           <br><br>
       <div class="row">
        <div class="col-sm-5">
          <button type="submit" name="change_status" class="btn btn-success">CHANGE STATUS</button><br><br><br><br><br>
       </div>
       </div>

      </form>
      </div>
    </div>

    <div class="col-sm-6">
    <div class="well well-lg" style="padding-bottom:85px;">
    <form action="" method="post">
    
      <h4 class="hbold1">DELETE FOOD:</h4>
      <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label>CANTEEN:</label>         
              <?php 
          $query="SELECT * FROM canteen";
         # $result=mysqli_query($connect,$query);
          echo "<select class='form-control' name='cantee'>";
             
                   
          while($row = mysqli_fetch_assoc($result))
            {
              echo "<option value='" .$row['canteen_id']. "'>" .$row['canteen_name']. "</option>"; 
            }
          echo "</select>";
          ?>
          
        </div>
     </div>
     </div>

     <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label for="session">SESSION:</label>
              <select class='form-control' name='session' id='session'>
                <option value='FN'>Forenoon</option>
                <option value='AF'>Afternoon</option>
                <option value='EV'>Evening</option>
              </select>
        </div>
        
        </div>
        <div class="col-sm-4 ">
        <button type="submit" name="filter3" class="btn btn-primary h">FILTER</button>
        </div>
     </div>

    
       <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label>FOOD NAME:</label>

        <?php

          $query="SELECT * FROM food";

          if(isset($_POST['filter3']))
          {
            $cid=mysqli_real_escape_string($connect,$_POST['cantee']);
            $ses=mysqli_real_escape_string($connect,$_POST['session']);
            $query="SELECT * FROM food where canteen_id= '$cid' AND session= '$ses'";
          }

        #  $result=mysqli_query($connect,$query);
           echo "<select class='form-control' name='food'>";
	           while($row = mysqli_fetch_assoc($result))
                {
                    $id=$row['food_name'];
                    echo "<option value='" .$id. "'>" .$id. "</option>";    
                }
          echo "</select>";
       ?> 
        </div>
      </div>
      </div>
    <?php
        
        if(isset($_POST['delete_food']))
        {
          delete_food($_POST['cantee'],$_POST['session'],$_POST['food']);
        }
    
    ?>
    <br>
    <div class="row">
      <div class="col-sm-5">
        <button type="submit" name="delete_food" class="btn btn-danger">Delete Food</button>
     </div>
  </div>

  </form>
  </div>
  </div>

</div>
</div>
    
   <div class="col-sm-6">
      <div class="well well-lg">
       <form action="" method="post">
            
        <h4 class="hbold1">MANAGE FOOD PRICE :</h4>
        <div class="row">
          <div class="col-sm-5">
           <div class="form-group">
             <label>CANTEEN:</label>

          <?php
            $query="SELECT * FROM canteen";
          #  $result=mysqli_query($connect,$query);
            echo "<select class='form-control' name='cantee'>";
            while($row = mysqli_fetch_assoc($result))
            {
                // $id=$row['canteen_id'];
                echo "<option value='" .$row['canteen_id']. "'>" .$row['canteen_name']. "</option>";    
            }
            echo "</select>";
          ?>
         </div>
        </div>
        </div>
      
       <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label for="session">SESSION:</label>
              <select class='form-control' name='session' id='session'>
                <option value='FN'>Forenoon</option>
                <option value='AF'>Afternoon</option>
                <option value='EV'>Evening</option>
              </select>
        </div>
        </div>
        <div class="col-sm-4 ">
        <button type="submit" name="filter3" class="btn btn-primary">FILTER</button>
        </div>
     </div>

    
       <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label>FOOD NAME:</label>

        <?php

          $query="SELECT * FROM food";

          if(isset($_POST['filter1']))
          {
            $cid=mysqli_real_escape_string($connect,$_POST['cantee']);
            $ses=mysqli_real_escape_string($connect,$_POST['session']);
            $query="SELECT * FROM food where canteen_id= '$cid' AND session= '$ses'";
          }

        #  $result=mysqli_query($connect,$query);
           echo "<select class='form-control' name='food'>";
	           while($row = mysqli_fetch_assoc($result))
                {
                    $id=$row['food_name'];
                    echo "<option value='" .$id. "'>" .$id. "</option>";    
                }
          echo "</select>";
       ?> 
        </div>
    
     </div>
     </div>
     
    
     <div class="row">
      <div class="col-sm-5">
        <div class="form-group">
        <label for="price">FOOD PRICE:</label>
       <input type="text"  class="form-control" name="price" id="price">
      </div>
      </div>
     </div>
        <?php
                
          if(isset($_POST['change_price']))
          {
              change_food_price($_POST['cantee'],$_POST['session'],$_POST['food'],$_POST['price']);
          }
            
        ?>
      <br>
      <div class="row">
          <div class="col-sm-5">
            <button type="submit" name="change_price" class="btn btn-success">CHANGE PRICE</button>
         </div>
      </div>
  
     
    </form>
    </div>
    </div>
    
  </div>
</div>

<!--3,4-->
<div class="container-fluid">
<div class="row">
  <div class="col-sm-6">
    <div class="well well-lg">
     <form action="" method="post">
        
      <h4 class="hbold1">MANAGE FOOD QUANTITY :</h4>
      <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label>CANTEEN:</label>

          <?php 
          $query="SELECT * FROM canteen";
       #   $result=mysqli_query($connect,$query);
          echo "<select class='form-control' name='cantee'>";
             
                   
          while($row = mysqli_fetch_assoc($result))
            {
              echo "<option value='" .$row['canteen_id']. "'>" .$row['canteen_name']. "</option>"; 
            }
          echo "</select>";
          ?>
          
        </div>
     </div>
     </div>
     
     <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label for="session">SESSION:</label>
              <select class='form-control' name='session' id='session'>
                <option value='FN'>Forenoon</option>
                <option value='AF'>Afternoon</option>
                <option value='EV'>Evening</option>
              </select>
        </div>
     </div>
     <div class="col-sm-4 mg">
        <button type="submit" name="filter3" class="btn btn-primary">FILTER</button>
        </div>
     </div>



       <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label>FOOD NAME:</label>

        <?php

          $query="SELECT * FROM food";

          if(isset($_POST['filter2']))
          {
            $cid=mysqli_real_escape_string($connect,$_POST['cantee']);
            $ses=mysqli_real_escape_string($connect,$_POST['session']);
            $query="SELECT * FROM food where canteen_id= '$cid' AND session= '$ses'";
          }

       #   $result=mysqli_query($connect,$query);
           echo "<select class='form-control' name='food'>";
	           while($row = mysqli_fetch_assoc($result))
                {
                    $id=$row['food_name'];
                    echo "<option value='" .$id. "'>" .$id. "</option>";    
                }
          echo "</select>";
       ?> 
        </div>
      </div>
      </div>

     <div class="row">
      <div class="col-sm-5">
        <div class="form-group">
        <label for="quantity">FOOD QUANTITY:</label>
       <input type="text"  class="form-control" name="quantity" id="quantity">
      </div>
      </div>
     </div>      
      <?php
            
        if(isset($_POST['change_quantity']))
        {
            change_food_quantity($_POST['cantee'],$_POST['session'],$_POST['food'],$_POST['quantity']);
        }
        
      ?>
     <br>
    <div class="row">
      <div class="col-sm-5">
        <button type="submit" name="change_quantity" class="btn btn-success">CHANGE QUANTITY</button>
     </div>
  </div>

  </form>
  </div>
</div>
 
 


<div class="col-sm-6">
      <div class="well well-lg">
        <form action="" method="post" enctype="multipart/form-data">
          
        <h4 class="hbold1">ADD FOOD :</h4>
        <div class="row">
          <div class="col-sm-5">
            <div class="form-group">
            <label for="canteen_id">CANTEEN ID:</label>
           <?php 
          $query="SELECT * FROM canteen";
       #   $result=mysqli_query($connect,$query);
          echo "<select class='form-control' name='canteen_id'>";                  
          while($row = mysqli_fetch_assoc($result))
            {
              echo "<option value='" .$row['canteen_id']. "'>" .$row['canteen_name']. "</option>"; 
            }
          echo "</select>";
          ?>
          
        </div>
     </div>
     </div>   
        

         <div class="row">
          <div class="col-sm-5">
            <div class="form-group">
            <label for="food_id">FOOD ID:</label>
           <input type="text"  class="form-control" name="food_id" id="food_id">
          </div>
          </div>
         </div>
        
        

        <div class="row">
          <div class="col-sm-5">
            <div class="form-group">
            <label for="food_name">FOOD NAME:</label>
           <input type="text"  class="form-control" name="food_name" id="food_name">
          </div>
          </div>
         </div>
        
        <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label for="session">SESSION:</label>
              <select class='form-control' name='session' id='session'>
                <option value='FN'>Forenoon</option>
                <option value='AF'>Afternoon</option>
                <option value='EV'>Evening</option>
              </select>
        </div>
     </div>
     </div>

        <div class="row">
          <div class="col-sm-5">
            <div class="form-group">
            <label for="food_price">FOOD PRICE:</label>
           <input type="text"  class="form-control" name="food_price" id="food_price">
          </div>
          </div>
         </div>

    <div class="row">
      <div class="col-sm-5">
        <div class="form-group">
        <label for="food_quantity">FOOD QUANTITY:</label>
       <input type="text"  class="form-control" name="food_quantity" id="food_quantity">
      </div>
      </div>
     </div>
  
       
       
       <div class="row">
        <div class="col-sm-5">
            <div class="form-group form-inline">
                <label for="photo_upload">Upload Photo Here</label>
                <input type="file" name="photo_upload">
            </div>
       </div>
    </div>
       
       
        <?php
              if(isset($_POST['add_food']))
              { 
              add_food($_POST['canteen_id'],$_POST['food_id'],$_POST['food_name'],$_POST['session'],$_POST['food_price'],$_POST['food_quantity']); 
              }
          ?>
          
          <br>
      <div class="row">
        <div class="col-sm-5">
          <button type="submit" name="add_food" class="btn btn-success">ADD FOOD</button>
       </div>
    </div>
    
    </form>
    </div>
    </div>


<!--5,6-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <div class="well well-lg" style="padding-bottom:243px;">
      
        <form action="" target="_blank" method="post">
          
          
          <h4 class="hbold1" >VIEW FOOD DETAILS :</h4>
          <br>
          <br>
          <div class="row">
            <div class="col-sm-5">
             <div class="form-group">
               <label>CANTEEN:</label>
 
             <?php 
          $query="SELECT * FROM canteen";
       #   $result=mysqli_query($connect,$query);
          echo "<select class='form-control' name='cantee1'>";                   
          while($row = mysqli_fetch_assoc($result))
            {
              echo "<option value='" .$row['canteen_id']. "'>" .$row['canteen_name']. "</option>"; 
            }
          echo "</select>";
          ?>
          
        </div>
     </div>
     </div>
     
     <br>

     <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label for="session">SESSION:</label>
              <select class='form-control' name='session' id='session'>
                <option value='FN'>Forenoon</option>
                <option value='AF'>Afternoon</option>
                <option value='EV'>Evening</option>
              </select>
        </div>
     </div>
     <div class="col-sm-4 ">
        <button type="submit" name="filter3" class="btn btn-primary">FILTER</button>
        </div>
     </div>

    
       <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
           <label>FOOD NAME:</label>

        <?php

          $query="SELECT * FROM food";

          if(isset($_POST['filter4']))
          {
            $cid=mysqli_real_escape_string($connect,$_POST['cantee1']);
            $ses=mysqli_real_escape_string($connect,$_POST['session']);
            $query="SELECT * FROM food where canteen_id= '$cid' AND session= '$ses'";
          }

        #  $result=mysqli_query($connect,$query);
           echo "<select class='form-control' name='food1'>";
	           while($row = mysqli_fetch_assoc($result))
                {
                    $id=$row['food_name'];
                    echo "<option value='" .$id. "'>" .$id. "</option>";    
                }
          echo "</select>";
       ?> 
        </div>
      </div>
      </div>
       <?php
              
              if(isset($_POST['view_details']))
              {
                  view_food_details($_POST['cantee1'],$_POST['session'],$_POST['food1']);
              }
          
          ?>
          <br>
        <div class="row">
          <div class="col-sm-5">
            <button type="submit" name="view_details" class="btn btn-success">VIEW DETAILS</button>
         </div>
      </div>

        </form>
      </div>
     </div>

    

</div>
</div>
</body>
</html>
