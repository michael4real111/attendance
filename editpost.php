<?php 
   
    require_once 'db/conn.php';

    if (isset($_POST['submit'])){

        $id = $_POST['applicantid'];
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $address = $_POST['Address'];
        $contact = $_POST['contactnumber'];
        $dob = $_POST['dob'];
        $parish = $_POST['Parish'];
        $email = $_POST['Email1'];
        $occupation = $_POST['occupation'];

        
        $result =$crud->edit($id, $fname, $lname, $address, $contact, $dob, $parish, $email, $occupation);

        if($result){
            header("Location: viewrecords.php");
    }else{
        include 'includes/errormessage.php';
    }
    }
    else{
        include 'includes/errormessage.php';
    }
?>


