<?php
require 'config\config.php';
require 'config\functions.php';
$bank_id = $_POST["bank_id"];
$result = mysqli_query($conn,"SELECT * FROM branch where bank_id = $bank_id") or die( mysqli_error($conn));
?>
<option value="" disabled selected>-- Select Any One --</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["branch_id"];?>"><?php echo $row["branch"];?></option>
<?php
}
?>