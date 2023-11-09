<?php 
    $title = 'View Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(!isset($_GET['applicantid'])){

        include 'includes/errormessage.php'; 
    }
    else{

        $id = $_GET['applicantid'];
        $result = $crud->getApplicantsDetails($id);
   
?>

<div class="card">
            <div class="card-body">
            <h5 class="card-title"> 
                <?php echo $result['firstname'] . " " . $result['lastname']; ?>
                </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['occupation_name'];?></h6>

            <p class="card-text"> Date of Birth: 
                <?php echo  $result['dateofbirth'];?></p>
            
            <p class="card-text"> Address: 
                <?php echo  $result['address'] . " , " . $result['parish_name'];?></p> 
                
            <p class="card-text"> Contact Number: 
                <?php echo  $result['contactnumber'];?></p>

            <p class="card-text"> Email Address: 
                <?php echo  $result['email'];?></p>
            
            </div>
            </div>
            <br/>
                <a href ="viewrecords.php" class="btn btn-info">Back to List</a>
                <a href ="edit.php?applicantid=<?php echo $result['applicant_id'] ?>" class="btn btn-primary">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete record?');"
                href ="delete.php?applicantid=<?php echo $result['applicant_id'] ?>" class="btn btn-danger">Delete</a>
                
            <?php }?>

    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>