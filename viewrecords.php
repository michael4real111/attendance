<?php 
    $title = 'View Applications';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    $result = $crud ->getApplicants();

?>
<br>
<br>

<table class="table">
  <thead class="thead-dark">
<tr>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Occupation</th>
    <th>Actions</th>

</tr>
    <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
        
        <tr>
            <td><?php echo $r['applicant_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['occupation_name'] ?></td>
            <td>
                <a href ="view.php?applicantid=<?php echo $r['applicant_id'] ?>" class="btn btn-dark">View</a>
                <a href ="edit.php?applicantid=<?php echo $r['applicant_id'] ?>" class="btn btn-primary">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete record?');"
                href ="delete.php?applicantid=<?php echo $r['applicant_id'] ?>" class="btn btn-danger">Delete</a>
                </td>
        </tr>


        <?php }?>
</table>

        <br>
        <br>
        <br>

<?php require_once 'includes/footer.php'; ?>
