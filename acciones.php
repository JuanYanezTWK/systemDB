<?php

include 'conexion/conexion.php';
$conexion = new Conexion();
$con = $conexion-> getConexion();


try{    
    //Hacemos el select de la cantidad de usuarios de la base de datos, y los guardamos en un array
    if ($_GET['action']=='list') {
        //Hacemos la query para sacar cantidad total de registros en la tabla
        $sql="SELECT count(*) as RecordCount from users";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        $recordCount=$row['RecordCount'];
        
        //obtenemos datos de paginacion de la tabla y hacemos el query con el limit de la cantidad de usuarios que se mostraran
        $campoDorden=$_GET['jtSorting'];
        $inicioReg=$_GET['jtStartIndex'];
        $finReg=$_GET['jtPageSize'];
        $sql="SELECT * FROM users order by '$campoDorden' limit $inicioReg,$finReg";
        $result=mysqli_query($con,$sql);   
        $rows=array();
        //hacemos un loop a la consulta de arriba y agregamos los datos a un array para mandar por json
        while($row=mysqli_fetch_array($result)){
            $rows[]=$row;
        }
        //retornamos un array por json con los datos
        $jTableResult=array();
        $jTableResult['Result']="OK";
        $jTableResult['TotalRecordCount']=$recordCount;
        $jTableResult['Records']=$rows; 
        echo json_encode($jTableResult);
    }

else if($_GET["action"] == "delete")
{
    //Hacemos la query para el delete
    $sql = "DELETE FROM users WHERE user_id = " . $_POST["user_id"] . ";";
    $result = mysqli_query($con, $sql);

    //Retornamos el result a la tabla
    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    echo json_encode($jTableResult);
}

//Cerramos la conexion a base de datos
mysqli_close($con);   

}catch (Exception $e){
    $jTableResult=array();
    $jTableResult['Result']="ERROR";
    $jTableResult['Message']=$e->getMessage();
    echo json_encode($jTableResult);
}
?>