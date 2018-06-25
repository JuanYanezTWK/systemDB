<?php

session_start();
if(!isset($_SESSION['usuario']) ){
	header('Location: home.php');  
 
}
else{
$_SESSION['admin'];
require 'session/login.php';
};
?>


<html lang="es">
    <head>
        <title>
        Usuarios
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos.css">
        <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	    <link href="Scripts/jtable/themes/lightcolor/green/jtable.css" rel="stylesheet" type="text/css" />
	
	    <script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
 
    </head>
    <body>
        <form id="formulario">
        <div id="usuarios" style="width: 700px"></div>   
       
        </form>
    </body>
</html>

    <script type="text/javascript">
        $(document).ready(function(){
           $('#usuarios').jtable({
               title: "Usuarios registrados",
               paging: true, //paginacion de la tabla es verdadera
               pageSize: 10, //numero de registros
               sorting: true, //ordenado de registros
               defaultSorting: 'user_id ASC', //modo de ordenado
               actions:{
                   listAction: 'accciones.php?action=list', //definimos como mandaremos los datos
                   createAction: 'accciones.php?action=create',
				   updateAction: 'accciones.php?action=update',
				   deleteAction: 'accciones.php?action=delete' 
               },
               fields:{
                   user_id:{
                       key:true,
                       title:'ID',
                       create:false,
                       edit: false,
                       width:'5%'
                       
                   },
                   user_name:{
                       title:'Nombre de usuario',
                       width:'25%',
                       create: true,
                       edit:true
                       
                   },
                   user_pass:{
                       title:'Contraseña',
                       width: '20%',
                       create:true,
                       edit:true
                   },
                   user_position:{
                       title:'Cargo',
                       width:'20%',
                       create:true,
                       edit:true
                   }
               }
           }); 
           $('#usuarios').jtable('load'); //carga las acciones
         
        });
    
    </script>
  