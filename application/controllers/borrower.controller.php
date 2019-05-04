<?php
require_once('../models/main.model.php');
$_POST = json_decode(file_get_contents("php://input"), true);
$data = [];

switch ($_POST['type']) {
    case 'get-employer-data':
        $data = $main->getAll("SELECT employerID as `value`,`name` as `display` FROM employer",array());
        break;
    case 'get-comaker-data':
        $data = $main->getAll("SELECT comakerID as `value`,CONCAT(fName,' ',midName,' ',lName) as `display` FROM comaker",array());
        break;
    case "add-data":
        if(isset($_POST['contents'])){
            foreach($_POST['contents'] as $tableName => $table){
                $insert = isset($table['insert'])?$table['insert']:true;
                $parent = isset($table['parent'])?$table['parent']:false;
                $nameOfTable = isset($table['db'])?$table['db']:$tableName;
                if($insert){
                    if(isset($table['fields'])){
                        if($parent){
                            $execution = $main->insertInto($nameOfTable,$table['fields'],true);
                            if($execution!=0){
                                $columnParent = $main->getOne("SHOW COLUMNS FROM `$nameOfTable`;");
                                $columnValue = $execution;
                                $data[$nameOfTable] = true;
                            }else{
                                $data[$nameOfTable] = false;
                            }
                        }else{
                            if(isset($columnParent)&&isset($columnValue)){
                                $table['fields']['parentid']['db'] = $columnParent;
                                $table['fields']['parentid']['value'] = $columnValue;
                            }
                            $get = isset($_POST['get'])?$_POST['get']:'';
                            if($get=='id'){
                                $data[$nameOfTable] = $main->insertInto($nameOfTable,$table['fields'],true);
                            }else{
                                $data[$nameOfTable] = $main->insertInto($nameOfTable,$table['fields']);
                            }
                        }
                    }
                }
            }
        }
        break;
    default:
        # code...
        break;
}



echo json_encode($data);