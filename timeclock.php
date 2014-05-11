<div class="huge buttons">
	<div><a href='index.php?action=timeclock&do=add_entry'><?php echo $lbl_string['LBL_TIMECLOCK_NEW']; ?></a></div>
	<div><a href='index.php?action=timeclock&do=mod_entry'><?php echo $lbl_string['LBL_TIMECLOCK_EDIT']; ?></a></div>
</div>
<?php

if(empty($_REQUEST['do'])) {
	$preset_list = new preset();
	$ids = $preset_list->fetch_all_ids();
	
	foreach ($ids as $id) {
		$bean = new preset();
		$bean->fetch($id);
		
		$active = ($bean->active) ? "<div class='preset_on active_button'></div>" : "<div class='preset_off active_button'></div>" ;
			
		echo "<div class='preset_line bigger' id='".$bean->id."' onmousedown='timeclock_onclick_handler(this.id)'>";
		echo "<p class='large'>$bean->name | $bean->temp&deg;C </p> $bean->start_time - $bean->end_time | ($bean->days_translated)";
		echo $active;
		echo "</div>";
	}	
}

//add entry link
if ($_REQUEST['do'] == 'add_entry') {
	require 'forms/preset_add_entry.php';
}

//mod entry link
if ($_REQUEST['do'] == 'mod_entry') {
	require 'forms/preset_mod_entry.php';
}

//insert if submit data

if($_REQUEST['name']) {
	
	$save_bean = new preset();
	
	foreach($_REQUEST as $name => $value) {
		$save_bean->$name  = $value;
	}
	
	$save_bean->save();
	
	header("Location: index.php?action=timeclock");
}


?>
