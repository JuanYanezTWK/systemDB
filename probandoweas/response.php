<?php
//include connection file 
//no me acuerdo que queria hacer con este responde, parece que era otra forma de llenar otra tabla que estaba haciendo xd
include("connect.php");
$db = new Conexion();
$connString =  $db->getConexion();

$params = $_REQUEST;
$action = $params['action'] !='' ? $params['action'] : '';
$empCls = new Employee($connString);

switch($action) {
 case 'list':
  $empCls->getEmployees();
 break;
 default:
 return;
}


class Employee {
  protected $conn;
  protected $data = array();
  function __construct($connString) {
    $this->conn = $connString;
  }
  
  function getEmployees() {
    $data = array();
    $sql = "SELECT * FROM users ";
    
    $queryRecords = mysqli_query($this->conn, $sql) or die("error to fetch employees data");
    
    while( $row = mysqli_fetch_assoc($queryRecords) ) { 
      $data[] = $row;
      //echo "<pre>";print_R($data);die;
    }
    
    $json_data = array(
      "Result" => 'OK', 
      "Records"  => $data   // total data array
      );

  echo json_encode($json_data);  // send data as json format*/
    
    
  }
  

}