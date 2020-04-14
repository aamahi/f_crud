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
            'id'=>2,
            'name'=>'Shafin Hasan',
            'dept'=>'BBA',
            'roll'=>'252',
        ],[
            'id'=>3,
            'name'=>'Nomik Uddin',
            'dept'=>'EEE',
            'roll'=>'253',
        ],
    ];
    // $fp = fopen(DB_NAME,'w');
    // foreach($data as $student){
    //     fputcsv($fp,$student);
    // }
    $serializeData = serialize($data);
    file_put_contents(DB_NAME,$serializeData);
}
    function genarateReport(){
        $serializeData = file_get_contents(DB_NAME);
        $students = unserialize($serializeData);
        ?>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Dept</th>
                <th scope="col">Roll</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($students as $student){
            ?>
                <tr>
                    <th scope="row"><?php printf("%s",$student['id'])?></th>
                    <th scope="row"><?php printf("%s",$student['name'])?></th>
                    <th scope="row"><?php printf("%s",$student['dept'])?></th>
                    <th scope="row"><?php printf("%s",$student['roll'])?></th>
                    <th scope="row">
                        <?php printf("<a href='index.php?task=edit&id=%s' class='btn btn-info'>Edit</a>",$student['id'])?>
                        <?php printf("<a href='index.php?task=delete&id=%s' class='btn btn-danger'>Delete</a>",$student['id'])?>
                    </th>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        <?php
    }

    function add_student($name,$dept,$roll){
        $found = false;
        $serializeData = file_get_contents(DB_NAME);
        $students = unserialize($serializeData);
        foreach($students as $_student){
           if($_student['roll']== $roll){
                $found = true;
                break;
           }
        }
        if(!$found){
            $new_id = count($students)+1;
            $student = array(
                'id'=>$new_id,
                'name'=>$name,
                'dept'=>$dept,
                'roll'=>$roll,
            );

            array_push($students,$student);

            $serializeData = serialize($students);
            file_put_contents(DB_NAME,$serializeData);

            return true;
        }
        return false;
    }
?>
