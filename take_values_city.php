<?php

    include ("Classes/connectionDatabase.Class.php");
    include ("Classes/City.class.php");

    $ci = new City();


    //values of cities
    $cityName = $_POST["cityName"];
    $uf = $_POST["uf"];

    $ci->setNameCity($cityName);
    $ci->setUf($uf);
    // $ci->insertCity($con->connect());


?>