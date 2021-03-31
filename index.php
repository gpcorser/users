<?php

// core.php holds pagination variables
include_once 'config/core.php';
  
// database.php specifies Database class 
include_once 'config/database.php';

// persons.php specifies Person class
include_once 'objects/persons.php';
  
// instantiate Database class and connect
$database = new Database();
$db = $database->getConnection();

// instantiate Person class
$person = new Person($db);
  
$page_title = "Persons List";
include_once "layout_header.php";
  
// query records from SQL table
$stmt = $person->readAll($from_record_num, $records_per_page);

// specify the page where paging is used
$page_url = "list.php?";
  
// count total rows for pagination
$total_rows=$person->countAll();
  
// read_template.php controls how the person list will be rendered
include_once "read_template.php"; // change to list_template
  
// layout_footer.php holds our javascript and closing html tags
include_once "layout_footer.php";

?>