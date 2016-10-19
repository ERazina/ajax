<?php 

$db = mysqli_connect('localhost', 'root', '', 'abit');
mysqli_set_charset ($db, 'utf8');
$answ['error'] = 1;
$answ['text'] = 'Неизвестный запрос';
$action = $_REQUEST['type'];
switch($action){
    case 'remove':
        $id = (int)$_POST['id'];
        mysqli_query($db, 'DELETE FROM `abits` WHERE
        `id` = '.$id);
        $answ['error'] = mysqli_errno($db);
        $answ['text'] = mysqli_error($db);
        break;
}
echo json_encode($answ);

?>