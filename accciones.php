<?php
   
    include 'session/conexion.php';
    $conexion = new Conexion();
    $con = $conexion-> getConexion();
    
    
    try{    
        //aca esta la manera en que la tabla escuchaba, es de tipo GET, no averigue sobre como llenarla con POST
        if ($_GET['action']=='list') {
            //sacar cantidad total de registros en la tabla
            $sql="SELECT count(*) as RecordCount from users";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result);
            $recordCount=$row['RecordCount'];
            
            //obtenemos datos de paginacion y hacemos el query
            $campoDorden=$_GET['jtSorting'];
            $inicioReg=$_GET['jtStartIndex'];
            $finReg=$_GET['jtPageSize'];
            $sql="SELECT * FROM users order by '$campoDorden' limit $inicioReg,$finReg";
            $result=mysqli_query($con,$sql);   
            //agregar datos a un arreglo y mandar por json
            $rows=array();
            //hacemos un loop a toda la consulta de arriba
            while($row=mysqli_fetch_array($result)){
                $rows[]=$row;
            }
            $jTableResult=array();
            $jTableResult['Result']="OK";
            $jTableResult['TotalRecordCount']=$recordCount;
            $jTableResult['Records']=$rows; 
            echo json_encode($jTableResult);
        }
        
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$sql = "INSERT INTO users(user_name, user_pass, user_position) VALUES('" . $_POST["user_name"] . "', '" . $_POST["user_pass"] . "', '" . $_POST["user_position"] . "') ";
		$result=mysqli_query($con,$sql);
		//Get last inserted record (to return to jTable)
        $sql = "SELECT * FROM users where user_id = LAST_INSERT_ID();";
        $result=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		echo json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
        //Update record in database
        $sql = "UPDATE users SET user_name = '" . $_POST["user_name"] . "', user_pass = '" . $_POST["user_pass"] . "', user_position = '" . $_POST["user_position"] . "' WHERE user_id = '" . $_POST["user_id"] . "'; ";
		$result = mysqli_query($con, $sql);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		echo json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
        //Delete from database
        $sql = "DELETE FROM users WHERE user_id = " . $_POST["user_id"] . ";";
		$result = mysqli_query($con, $sql);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		echo json_encode($jTableResult);
	}

	//Close database connection
	mysqli_close($con);   

    }catch (Exception $e){
        $jTableResult=array();
        $jTableResult['Result']="ERROR";
        $jTableResult['Message']=$e->getMessage();
        echo json_encode($jTableResult);
    }
?>