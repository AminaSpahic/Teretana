<?php

function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}


function rest_get($request, $data) 
{
        $idv = $_GET['id'];
        $veza = new PDO('mysql:host=localhost;dbname=teretana;charset=utf8', 'admin', 'admin123');
        $veza->exec("set names utf8");
        $upit = $veza->prepare("SELECT * FROM programi WHERE id=?");
        $upit->bindValue(1, $idv, PDO::PARAM_INT);
        $upit->execute();
        $ispis = '';
		foreach($upit->fetchAll() as $red) {
			$ispis = array('program' => $red['program'], 'cijena' => $red['cijena']);
		}
		if($ispis != ''){
			echo json_encode($ispis, JSON_UNESCAPED_UNICODE);
		}
		else {
			rest_error($ispis);
		}
    
}
function rest_post($request, $data) 
{
    print "Servis za POST nije implementiran";
}
function rest_delete($request) 
{
    print "Servis za DELETE nije implementiran.";
}
function rest_put($request, $data) 
{ 
    print "Servis za PUT nije implementiran.";
}
function rest_error($request) 
{ 
    print "Nije implementiran servis za ERROR.";
}

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>
