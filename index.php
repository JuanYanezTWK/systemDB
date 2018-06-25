<?php
?>
<html lang="es">
    <head>
        <title>
        Usuarios
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css">
        <link rel="stylesheet" href="jtable/themes/lightcolor/green/jtable.css">
        <script src="jquery.min.js"></script>
        <script src="jquery/jquery-ui.js"></script>
        <script src="jtable/jquery.jtable.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
 
    </head>
    <body>
        <form id="formulario">
        <div id="usuarios" style="width: 900px"></div>   
        <div class="btn-group">
            <button type="button" id="add" class="btn btn-success">Agregar</button>
        </div>
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
                   listAction: 'accciones.php?action=list' //definmos como mandaremos los datos
               },
               fields:{
                   user_id:{
                       key:true,
                       title:'ID',
                       create:false,
                       edit:false,
                       width:'5%'
                       
                   },
                   user_name:{
                       title:'Nombre de usuario',
                       width:'30%',
                       
                   },
                   user_pass:{
                       title:'Contraseña',
                       width: '30%',
                       create:false,
                       edit:false
                   },
                   user_position:{
                       title:'Cargo',
                       width:'30%',
                       create:false,
                       edit:false
                   }
               }
           }); 
           $('#usuarios').jtable('load'); //carga las acciones
           $('#add').click(function(){
        window.location="registro.php";
    });
        });
    
    </script>
  
 