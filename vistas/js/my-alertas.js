 $('.btn-file-loan').click(function(){
   var user=$(this).attr('data-user');
   var codeL=$(this).attr('data-code-loan');
   swal({
        title: "¿Quieres ver la ficha?",
        text: "La ficha se generará en formato PDF y se abrirá una ventana nueva. Debes esperar un lapso de tiempo de 15 segundos para que el sistema genere la ficha",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#31B0D5",
        confirmButtonText: "Si, ver ficha",
        cancelButtonText: "No, cancelar",
        animation: "slide-from-top",
        closeOnConfirm: true 
    },function(){
        if(user==="Docente"){
           var file="../report/fichaDN.php?loanCode="+codeL;
           window.open(file,"_blank");
       }else if(user==="Estudiante"){
           var file="../report/fichaEN.php?loanCode="+codeL;
           window.open(file,"_blank");
       }else if(user==="Visitante"){
           var file="../report/fichaVN.php?loanCode="+codeL;
           window.open(file,"_blank");
       }else if(user==="Personal"){
           var file="../report/fichaPN.php?loanCode="+codeL;
           window.open(file,"_blank");
       }else{
            swal({
               title:"¡Ocurrió un error inesperado!",
               text:"Hemos tenido un error, por favor recarga la página e intenta nuevamente",
               type: "error",
               confirmButtonText: "Aceptar"
            });
       }
    });
});