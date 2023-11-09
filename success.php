<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if (isset($_POST['submit'])){
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $address = $_POST['Address'];
        $contact = $_POST['contactnumber'];
        $dob = $_POST['dob'];
        $parish = $_POST['Parish'];
        $email = $_POST['Email1'];
        $occupation = $_POST['occupation'];

        $isSuccess = $crud->insert($fname, $lname, $address, $contact, $dob, $parish, $email, $occupation);

        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';

        }
    }
?>
    <br>
    <br>
    <br>
    <br>
    <h1 class = "text-center text-success" >Your Application was Submitted!</h1>

<!-- THIS WAS USING THE "GET" METHOD -->
   <!--         <div class="card">
            <div class="card-body">
            <h5 class="card-title"> 
                <?php // echo $_GET['firstname'] . " " . $_GET['LastName']; ?>
                </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php //echo $_GET['specialty'];?></h6>

            <p class="card-text"> Date of Birth: 
                <?php // echo  $_GET['dob'];?></p>
            
            <p class="card-text"> Address: 
                <?php // echo  $_GET['Address'] . " , " . $_GET['Parish'];?></p> 
                
            <p class="card-text"> Contact Number: 
                <?php // echo  $_GET['contactnumber'];?></p>

            <p class="card-text"> Email Address: 
                <?php // echo  $_GET['Email1'];?></p>

            <a href="#" class="card-link">Edit</a>
            
            </div>
            </div> -->


<!-- THIS WAS USING THE "POST" METHOD -->           
            <div class="card">
            <div class="card-body">
            <h5 class="card-title"> 
                <?php echo $_POST['FirstName'] . " " . $_POST['LastName']; ?>
                </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $_POST['occupation'];?></h6>

            <p class="card-text"> Date of Birth: 
                <?php echo  $_POST['dob'];?></p>
            
            <p class="card-text"> Address: 
                <?php echo  $_POST['Address'] . " , " . $_POST['Parish'];?></p> 
                
            <p class="card-text"> Contact Number: 
                <?php echo  $_POST['contactnumber'];?></p>

            <p class="card-text"> Email Address: 
                <?php echo  $_POST['Email1'];?></p>  
            </div>
            </div>


<br>
<br>
<button type="submit" name = "submit" class="btn btn-primary">Confirm</button>
    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'?>