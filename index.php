<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $occupationresults =$crud -> getOccupations();
    $parishresults =$crud -> getParish();
?>

    <h1 class = "text-center" >Registration Form</h1>
    <form method ="post" action = "success.php">
        <div class="form-group">
            <label for="FirstName">First Name</label>
            <input required type="text" class="form-control" id="FirstName" name ="FirstName">
            <small id="FNameHelp" class="form-text text-muted">Please enter your first name.</small>
        </div>

        <div class="form-group">
        <label for="LastName">Last Name</label>
            <input required type="text" class="form-control" id="LastName" name="LastName">
            <small id="LNameHelp" class="form-text text-muted">Please enter your last name.</small>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">
            <small id="dateofbirthHelp" class="form-text text-muted">Please enter your date of birth.</small>
        </div>

        <div class="form-group">
        <label for="Address">Address</label>
            <input required type="text" class="form-control" id="Address" name="Address">
            <small id="AddressHelp" class="form-text text-muted">Please enter your home address.</small>
        </div>

        <div class="form-group">
            <label for="Parish">Parish</label>
            <select class="form-control" id="Parish" name="Parish">
            <?php while($r = $parishresults->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value ="<?php echo $r['parish_id'] ?>"><?php echo $r['name'];?></option>
                <?php } ?>
    </select>
            <small id="parishHelp" class="form-text text-muted">Please select Parish.</small>
        </div>

        <div class="form-group">
            <label for="Email1">Email address</label>
            <input required type="email" class="form-control" id="Email1" 
            aria-describedby="emailHelp" placeholder="Enter email" name="Email1">
            <small id="emailHelp" class="form-text text-muted">Please enter your email address.</small>
        </div>


        <div class="form-group">
            <label for="contactnumber">Contact Number</label>
            <input required type="text" class="form-control" id="contactnumber" name="contactnumber">
            <small id="contactHelp" class="form-text text-muted">Please enter your contact number.</small>
        </div>

        <div class="form-group">
            <label for="occupation">Area of Expertise</label>
            <select class="form-control" id="occupation" name="occupation">
            <?php while($r = $occupationresults->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value ="<?php echo $r['occupation_id'] ?>"><?php echo $r['name'];?></option>
                <?php } ?>
    </select>
            <small id="occupationHelp" class="form-text text-muted">Please select your occupation.</small>
        </div>

        <button type="submit" name = "submit" class="btn btn-primary btn-block">Submit</button>
      
</form>
        <br>
        <br>
        <br>

<?php require_once 'includes/footer.php'; ?>