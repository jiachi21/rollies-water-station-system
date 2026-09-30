<?php

require "../vendor/autoload.php";

include "../config/database.php";


use PhpOffice\PhpSpreadsheet\IOFactory;


$file = $_FILES['file']['tmp_name'];


$spreadsheet = IOFactory::load($file);


$sheet = $spreadsheet->getActiveSheet();


$rows = $sheet->toArray();


$count = 0;


foreach($rows as $index=>$row){


    // skip header

    if($index == 0){

        continue;

    }


    $name = trim($row[0]);


    if($name==""){

        continue;

    }


    $sql="

    INSERT INTO customers

    (
    customer_name,
    status
    )

    VALUES

    (
    '$name',
    'Active'
    )

    ";


    mysqli_query($conn,$sql);


    $count++;


}


echo "

<h2>
Import Complete
</h2>

<p>
$count customers added.
</p>

<a href='customers.php'>
Back to Customers
</a>

";

?>