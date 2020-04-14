<?php
define('DB_NAME','/var/www/html/f_c/data/db.txt');
function seed(){
    $data = [
        [
            'id'=>1,
            'name'=>'Abdullah Mahi',
            'dept'=>'CSE',
            'roll'=>'251',
        ],
        [
            'id'=>1,
            'name'=>'Shafin Hasan',
            'dept'=>'BBA',
            'roll'=>'252',
        ],[
            'id'=>1,
            'name'=>'Nomik Uddin',
            'dept'=>'EEE',
            'roll'=>'252',
        ],
    ];
    // $fp = fopen(DB_NAME,'w');
    // foreach($data as $student){
    //     fputcsv($fp,$student);
    // }
    $serializeData = serialize($data);
    file_put_contents(DB_NAME,$serializeData);
}
seed();
?>
