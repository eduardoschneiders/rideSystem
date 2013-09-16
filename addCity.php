
<?php
include ("Includes/config.php");


$html = new Html();

echo $html->header();
?>

<form method="post" action="take_values_city.php">
    Nome: <input type="text" name="cityName" id="cityName"></input></br>
    Uf:   <input type="text" name="uf"></input></br>
    <input type="submit" name="save" value="save"></input>
</form>




<?php echo $html->footer(); ?>
