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
                if($tableName == "spouse"){
                    var_dump($table);
                    die;
                }
                if($insert){
                    if(isset($table['fields'])){
                        $nameOfTable = isset($table['db'])?$table['db']:$tableName;
                        $columns = []; $values = []; $qmarks = [];
                        $lastId = $main->getOne("SELECT borrowerID FROM borrower ORDER BY borrowerID DESC",array());
                        $borrowerID = (is_numeric($lastId)?$lastId:0) + 1;
                        $values[] = $borrowerID;
                        $columns[] = "borrowerID";
                        $qmarks[] = "?";
                        foreach($table['fields'] as $fieldName => $field){
                            $columns[] = isset($field["db"])?$field['db']:$fieldName;
                            $values[] = isset($field["value"])?$field['value']:"";
                            $qmarks[] = "?";
                        }
                        $query = "INSERT INTO `$nameOfTable` (".implode(",",$columns).") VALUES(".implode(",",$qmarks).")";
                        $data[$nameOfTable] = $main->perf($query,$values);
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