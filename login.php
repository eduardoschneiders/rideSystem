<?php
    include ("Includes/config.php");

    $html = new Html();

    echo $html->header();

?>
<form method="post" action="check_values_login.php">
	<input type="text" name="nome"></br>
	<input type="password" name="senha"></br>
	<input type="submit" name="submit">
</form>


<?php echo $html->footer(); ?>
