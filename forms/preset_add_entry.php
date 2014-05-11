<?php
session_start();

if(!$_SESSION['name']) {
	header("location: index.php");
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=timeclock" method="post" >
	<input class="huge" placeholder="<?php echo $lbl_string['LBL_NAME']; ?>" type="text" name="name" required/>
	<label class="huge"><?php echo $lbl_string['LBL_PRIORITY']; ?></label>
	<input class="huge" type="number" name="priority" min="0" required/>
	<label class="huge"><?php echo $lbl_string['LBL_START_TIME']; ?></label>
	<input class="huge" type="time" name="start_time" required/><br/>
	<label class="huge"><?php echo $lbl_string['LBL_END_TIME']; ?></label>
	<input class="huge" type="time" name="end_time" required/><br/>
	<label class="huge"><?php echo $lbl_string['LBL_TEMP']; ?></label>
	<input class="huge" type="number" name="temp" min="5" max="30" step="0.5" required/><br/>
	<label class="huge"><?php echo $lbl_string['LBL_MON']; ?></label>
	<input class="huge large_checkbox" type="checkbox" name="days[]" value="1"/>
	<label class="huge"><?php echo $lbl_string['LBL_TUE']; ?></label>
	<input class="huge large_checkbox" type="checkbox" name="days[]" value="2"/>
	<label class="huge"><?php echo $lbl_string['LBL_WED']; ?></label>
	<input class="huge large_checkbox" type="checkbox" name="days[]" value="3"/>
	<label class="huge"><?php echo $lbl_string['LBL_THU']; ?></label>
	<input class="huge large_checkbox" type="checkbox" name="days[]" value="4"/>
	<label class="huge"><?php echo $lbl_string['LBL_FRI']; ?></label>
	<input class="huge large_checkbox" type="checkbox" name="days[]" value="5"/><br/>
	<label class="huge"><?php echo $lbl_string['LBL_SAT']; ?></label>
	<input class="huge large_checkbox" type="checkbox" name="days[]" value="6"/>
	<label class="huge"><?php echo $lbl_string['LBL_SUN']; ?></label>
	<input class="huge large_checkbox" type="checkbox" name="days[]" value="7"/><br/>
	<input class="huge" type="submit" />
</form>
