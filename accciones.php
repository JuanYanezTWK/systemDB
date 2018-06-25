<?php
    /*include 'connect.php';
    $conexion = new Conexion();
    $con = $conexion->getConexion();
    Esto lo deje comentado, ya que habia creado una clase para conexion a la bD de tipo PDO, no pude conectarla a este php, 
    asi que lo use de otra manera al final y lo guarde para ver si logro aprender mas de PDO, cree una nueva clase de conexion
    y la añadi aqui abajo
    */
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
		$result = mysql_query("INSERT INTO users(user_name, user_pass, user_position) VALUES('" . $_POST["username"] . "', '" . $_POST["userpass"] . "', '" . $_POST["userposition"] . "') ");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM people users PersonId = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE people SET user_name = '" . $_POST["username"] . "', user_pass = " . $_POST["userpass"] . ", user_position = '" . $_POST["userposition"] . "' WHERE user_id = " . $_POST["user_id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM users WHERE user_id = " . $_POST["user_id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);   

    }catch (Exception $e){
        $jTableResult=array();
        $jTableResult['Result']="ERROR";
        $jTableResult['Message']=$e->getMessage();
        echo json_encode($jTableResult);
    }
?>