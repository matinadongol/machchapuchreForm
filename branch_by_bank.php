<?php
require 'config\config.php';
require 'config\functions.php';
$bankname = $_POST["bankname"];
$result = mysqli_query($conn,"SELECT * FROM `branch` WHERE `bank` = '$bankname';") or die( mysqli_error($conn));
?>
<option value="" disabled selected>-- Select Any One --</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["branch"];?>"><?php echo $row["branch"];?></option>
<?php
}
?>