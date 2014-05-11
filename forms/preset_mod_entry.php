<?php
session_start();

if(!$_SESSION['name']) {
	header("location: index.php");
}

$preset_list = new preset();
	$ids = $preset_list->fetch_all_ids();
	
	foreach ($ids as $id) {
		$bean = new preset();
		$bean->fetch($id);
		
		$active = ($bean->active) ? "<div class='preset_on active_button'></div>" : "<div class='preset_off active_button'></div>" ;
			
		echo "<div class='preset_line bigger'>";
		echo "<p class='large'>$bean->name </div>";
	}

?>

