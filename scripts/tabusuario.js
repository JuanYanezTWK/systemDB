
        $(document).ready(function(){
            $('#usuarios').jtable({
                title: "Usuarios registrados",
                paging: true, //paginacion de la tabla
                pageSize: 10, //numero de registros
                sorting: true, //ordenado de registros
                defaultSorting: 'user_id ASC', //modo de ordenado
                actions:{
                    //Especificamos en donde estaran las acciones que ejecuta la tabla 
                    listAction: 'acciones.php?action=list',
                   },
                fields:{
                    user_id:{
                        key:true,
                        title:'ID',                        
                        width:'5%'
                        
                    },
                    user_name:{
                        title:'Nombre de usuario',
                        width:'20%',                      
                        
                    },
                    user_position:{
                        title:'Cargo',
                        width:'20%',
                        
                    }
 
                },
         messages:{
             serverCommunicationError: 'Ocurrio un error mientras se comunicaba con el servidor.',
             loadingMessage: 'Cargando usuarios...',
             noDataAvailable: 'No hay datos disponibles!',
             addNewRecord: 'Nuevo usuario',
             editRecord: 'Editar usuario',
             areYouSure: 'Estas seguro?',
             deleteConfirmation: 'Este usuario será eliminado. Estas seguro?',
             save: 'Guardar',
             saving: 'Guardando',
             cancel: 'Cancelar',
             deleteText: 'Eliminar',
             deleting: 'Eliminando',
             error: 'Error',
             close: 'Cerrar',
             cannotLoadOptionsFor: 'No se puede cargar opciones por campo {0}',
             pagingInfo: 'Mostrando {0}-{1} de {2}',
             pageSizeChangeLabel: 'Cantidad de usuarios',
             gotoPageLabel: 'Ir a la pagina',
             canNotDeletedRecords: 'No se puede eliminar {0} de {1} registros!',
             deleteProggress: 'Eliminando {0} de {1} registros, procesando...'
      }
            }); 
            $('#usuarios').jtable('load'); //carga las acciones
            
         });
 