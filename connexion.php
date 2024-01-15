<?php


try{
    $access=new PDO("pgsql:host=localhost;port=5432;dbname=tracmuscu","traqmuscu","123");
}
catch (Exception $e){
    $e->getMessage();
}