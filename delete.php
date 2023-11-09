<?php 
   
    require_once 'db/conn.php';

    
    if(!isset($_GET['applicantid'])){
        echo "<h1 class ='text-danger'> Please check details </h1>"; 
    }
    else{
        $id = $_GET['applicantid'];

        $result = $crud->deleteApplicant($id);       
    }
        if($result){
            header("Location: viewrecords.php");
    }else{
        include 'includes/errormessage.php';
    }
?>