function destroy(id,name){
    Swal.fire({
        title: 'Estas seguro?',
        text: "Deseas eliminar al rol "+name,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          deleteRol(id);
        }
      })
}

function deleteRol(id)
{
    $.ajax({
     url:"../../src/controller/RolController.php",
     type:"POST",
     data:{delete:'eliminar',id_rol:id},
     success:function(dta){
        if(dta.trim()==1){
            Swal.fire({
               
                title: 'Rol eliminado',
               
              }).then((result)=>{
                location.href="./index";
              });
        }else{
          if(dta.trim()==2){
            Swal.fire({
               icon:'error',
              title: 'Error al eliminar',
              text:'Imposible de eliminar este rol, porque se encuentra en uso'
             
            });
          }
        }
     }
    });
}

function modifyRol(idrol,Name_rol){
  DeletePermission(Id_rol);
  
    $.ajax({
        url:"../../src/controller/RolController.php",
        type:"POST",
        data:{updaterol:'update',idrol:idrol,namerol:Name_rol},
        success:function(dta){
           if(dta.trim()==1){
            modifyRolPermission(idrol)
               Swal.fire({
                  
                   title: 'Rol modificado',
                  
                 }).then((result)=>{
                   location.href="./index";
                 });
           }else{
            if(dta.trim()==2){
              modifyRolPermission(idrol)
                Swal.fire({
                  
                    title: 'Rol modificado',
                   
                  }).then((result)=>{
                    location.href="./index";
                  })
            }
           }
         
        }
       });
       
}

/**
 * Asignaper permisos a roles
 */

 function modifyRolPermission(idrol){  
  $('input[type=checkbox]:checked').each(function(){
    /// mandamos a modificar su permsisos
    $.ajax({
      url:"../../src/controller/RolController.php",
      type:"POST",
      data:{updaterol:'updateasign',idrol:idrol,idp:$(this).val()},
      success:function(dta){  
    
        
         /// mandamos a modificar su permsisos
      }
     });
})
}
/**
 * ELIMINAR PERMISOS POR ROL
 */

 function DeletePermission(idrols){
  $.ajax({
      url:"../../src/controller/RolController.php",
      type:"POST",
      data:{accion:'delete',idrol:idrols},
      success:function(dta){  
 
    
         /// mandamos a modificar su permsisos
      }
     });
}