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
                                $columnParent = $main->getOne("SHOW COLUMNS FROM `$nameOfTable`;",array());
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
    case 'get-data':
        if(isset($_POST['id'])){
            if(isset($_POST['tables'])){
                if(is_array($_POST['tables'])){
                    foreach($_POST['tables'] as $table){
                        $tableName = $table;
                        if($table == 'expense' || $table == 'income'){
                            $tableName = 'borrower_'.$table;
                        }
                        $data[$table] = $main->getAll("SELECT * FROM `$tableName` WHERE borrowerID = ?;",array($_POST['id']));
                    }
                }
            }
        }
        break;
    case 'save-data':
        if(isset($_POST['contents'])){
            if(isset($_POST['contents']['id'])){
                $id = $_POST['contents']['id'];
                $db = $_POST['contents']['db'];
                $where = " WHERE `$db` = $id";
                foreach($_POST['contents'] as $tableName => $table){
                    $insert = isset($table['insert'])?$table['insert']:true;
                    $nameOfTable = isset($table['db'])?$table['db']:$tableName;
                    if($insert){
                        if(isset($table['fields'])){
                            if(count($main->getAll("SELECT * FROM `$nameOfTable` $where ;",array()))>0){
                                $data[$nameOfTable] = $main->updateInfo($nameOfTable,$table['fields'],$where);
                            }else{
                                $table['fields']['parentid']['db'] = $db;
                                $table['fields']['parentid']['value'] = $id;
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