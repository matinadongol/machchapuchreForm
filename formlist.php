<?php
include "admin\inc\header.php";
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/model.php';

?>
<div class="container">
    <h4 class="mt-3">Form List</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Reference Number</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = mysqli_query($conn,"SELECT beneficialOwner.firstName, beneficialOwner.middleName, beneficialOwner.lastName, form.id as id from beneficialOwner join form on beneficialOwner.beneficialowner_id = form.id;") or die( mysqli_error($conn));
                $counts = 1;
                while($row = mysqli_fetch_array($result)) {
            ?>
            <td> <?php  echo $counts;?></td>
            <td><?php echo $row["id"]; ?></td>
            <td><?php 
                echo $row["firstName"]; 
                echo " "; 
                echo $row["middleName"];
                echo " "; 
                echo $row["lastName"];
                 ?>
            </td>
            <td>
                <?php
                $url='formDetail?id='.$row["id"];
                ?>
                <a href="<?php echo $url; ?>" class="btn btn-success">View</a>
            </td>
            <?php        
                    
                $counts++;   
                }
            ?>
        </tbody>
    </table>
</div>
<?php
include "admin/inc/footer.php";
?>