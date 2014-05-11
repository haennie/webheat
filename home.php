<?php
session_start();

if(!$_SESSION['name']) {
	header("location: index.php");
}

$temp = new sensor();

?>
<div class="huge wrapper_temp" id="wrapper_temp">
	<p><?php echo $lbl_string['LBL_CURRENT_TEMP']; ?></p>
	<div class="gigantic" id="temp"><?php echo $temp->get('current_temp'); ?>&deg;C</div>
</div>
<div class="bigger wrapper_temp">
	<?php echo $temp->get('humidity').'&#37; '.$lbl_string['LBL_HUMIDITY']; ?>
</div>
<div class="huge buttons">
	<div onclick="adjust_temp('+')"><?php echo $lbl_string['LBL_HOTTER']; ?></div>
	<div onclick="adjust_temp('-')"><?php echo $lbl_string['LBL_COLDER']; ?></div>
</div>

