 <script>
  $(document).ready(function(){
     $('.btn-exit-system').on('click', function(e){
        e.preventDefault();
        var Token=$(this).attr('href');
        swal({
              title: '¿Estás seguro?',
              text: "La sesion actual se cerrara y deberas iniciar sesion nuevamente",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3CB371',
              cancelButtonColor: '#F39C12',
              confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
              cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
           }).then(function () {
              $.ajax({
                url:'<?php echo SERVERURL; ?>ajax/loginAjax.php?Token='+Token,
                success:function(data){
                    if(data=="true"){
                      window.location.href="<?php echo SERVERURL; ?>login/";
                    }else{
                        swal(
                            "Ocurrio un error",
                            "No se pudo cerrar la sesión",
                            "error"
                        );
                    }
                }
              });
        });
      });
  });
 </script>
