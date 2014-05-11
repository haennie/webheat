<?php
session_start();

if(!$_SESSION['name']) {
	header("location: index.php");
}
?>

<div class="menu">
    <p>
        <a href="#" onclick="show_menu('menu')"><?php echo $lbl_string['LBL_MENU']; ?></a>
    </p>
    <div class="menu_values" id="menu">
        <?php
            foreach ($lbl_string_list['LBL_MENU_VALUES'] as $name => $value) {
                echo "<p><a href='index.php?action=$name'>$value</a></p>";
            }
        ?>
    </div>
</div>