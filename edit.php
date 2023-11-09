<?php 
    $title = 'Edit';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $occupationresults =$crud -> getOccupations();
    $parishresults =$crud -> getParish();
    
    if(!isset($_GET['applicantid'])){
       // echo "<h1 class ='text-danger'> Please check details </h1>"; 
       include 'includes/errormessage.php';
      
    }
    else{
        $id = $_GET['applicantid'];
        $result = $crud->getApplicantsDetails($id);       
?>

    <h1 class = "text-center" >Edit Applicant</h1>

    <form method ="post" action = "editpost.php">
        <input type="hidden" name="applicantid" value="<?php echo $result['applicant_id'] ?>" />
        <div class="form-group">
            <label for="FirstName">First Name</label>
            <input type="text" class="form-control" value ="<?php echo $result['firstname'] ?>" id="FirstName" name ="FirstName">
            <small id="FNameHelp" class="form-text text-muted">Please enter your first name.</small>
        </div>

        <div class="form-group">
        <label for="LastName">Last Name</label>
            <input type="text" class="form-control" value =" <?php echo $result['lastname'] ?> " id="LastName" name="LastName">
            <small id="LNameHelp" class="form-text text-muted">Please enter your last name.</small>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value ="<?php echo $result['dateofbirth'] ?>" id="dob" name="dob">
            <small id="dateofbirthHelp" class="form-text text-muted">Please enter your date of birth.</small>
        </div>

        <div class="form-group">
        <label for="Address">Address</label>
            <input type="text" class="form-control" value ="<?php echo $result['address'] ?> "id="Address" name="Address">
            <small id="AddressHelp" class="form-text text-muted">Please enter your home address.</small>
        </div>

        <div class="form-group">
            <label for="Parish">Parish</label>
            <select class="form-control" id="Parish" name="Parish">
            <?php while($r = $parishresults->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value ="<?php echo $r['parish_id'] ?>" 
                <?php if ($r['parish_name'] == $result['parish_name']) echo 'selected' ?>>
                    <?php echo $r['parish_name'];?>
                </option>
                <?php } ?>
            </select>
            <small id="parishHelp" class="form-text text-muted">Please select Parish.</small>
        </div>

        <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" value ="<?php echo $result['email'] ?> "id="Email1" 
            aria-describedby="emailHelp" placeholder="Enter email" name="Email1">
            <small id="emailHelp" class="form-text text-muted">Please enter your email address.</small>
        </div>

        <div class="form-group">
            <label for="contactnumber">Contact Number</label>
            <input type="text" class="form-control" value ="<?php echo $result['contactnumber'] ?>" id="contactnumber" name="contactnumber">
            <small id="contactHelp" class="form-text text-muted">Please enter your contact number.</small>
        </div>

        <div class="form-group">
            <label for="occupation">Area of Expertise</label>
            <select class="form-control" id="occupation" name="occupation">
            <?php while($r = $occupationresults->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value ="<?php echo $r['occupation_id']?>"
                <?php if ($r['occupation_name'] == $result['occupation_name']) echo 'selected' ?>>
                <?php echo $r['occupation_name'];?>
                </option>
                <?php } ?>
    </select>
            <small id="occupationHelp" class="form-text text-muted">Please select your occupation.</small>
        </div>
        <a href ="viewrecords.php" class="btn btn-default">Back to List</a>
        <button type="submit" name = "submit" class="btn btn-success btn">Save Changes</button>
      
    </form>

    <?php } ?>
       <br>
       <br>
       <br>

<?php require_once 'includes/footer.php'; ?>