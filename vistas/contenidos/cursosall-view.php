<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
        <h2 class="text-uppercase">
            <i class="zmdi zmdi-assignment-check"></i> Sistema de gestión - asycap ltda s.r.l. <small>Cursos programados</small>
        </h2>
    </div>
</div>
<div class="conteiner-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 19px; font-weight:bold;">
        <li>
            <a href="<?php echo SERVERURL; ?>cursosprogramados/">Programar curso</a>
        </li>
        <li  class="active">
            <a href="<?php echo SERVERURL; ?>cursosall/">Todos los cursos</a>
        </li>
    </ul>
</div>
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/calendar_book.png" alt="calendar" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Bienvenido a esta sección, aquí se muestran todos los cursos realizados 
            hasta la fecha y que ya se entregaron satisfactoriamente.
        </div>
    </div>
</div>
<div class="container-fluid">
<h2 class="text-center text-tittles" style="color: rgba(22, 184, 176); font-size: 35px; font-weight: bold;">Listado de cursos programados</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Curso</th>
                    <th>Docente</th>
                    <th>Instructor</th>
                    <th>Estudiante</th>
                    <th>Periodo</th>
                    <th>Salón</th>
                    <th>F. Inicio</th>
                    <th>F. Fin</th>
                    <th>Eliminar</th>
                    <th>Ver Ficha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="../process/DeleteLoan.php" method="post" class="form_SRCB" data-type-form="delete" style="width: 8%;">
                            <input type="hidden" value="U75154981P4N6793" name="LoanKey">
                            <input type="hidden" value="Estudiante" name="UserType">
                            <button type="submit" class="btn btn-danger btn-raised btn-sm">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-info btn-file-loan btn-raised btn-sm" data-user="Estudiante" data-code-loan="U75154981P4N6793">
                            <i class="zmdi zmdi-file-text"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="../process/DeleteLoan.php" method="post" class="form_SRCB" data-type-form="delete" style="width: 8%;">
                            <input type="hidden" value="U6767P3N2078" name="LoanKey">
                            <input type="hidden" value="Estudiante" name="UserType">
                            <button type="submit" class="btn btn-danger btn-raised btn-sm">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-info btn-file-loan btn-raised btn-sm" data-user="Estudiante" data-code-loan="U6767P3N2078">
                            <i class="zmdi zmdi-file-text"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="../process/DeleteLoan.php" method="post" class="form_SRCB" data-type-form="delete" style="width: 8%;">
                            <input type="hidden" value="U2435P6N1856" name="LoanKey">
                            <input type="hidden" value="Estudiante" name="UserType">
                            <button type="submit" class="btn btn-danger btn-raised btn-sm">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-info btn-file-loan btn-raised btn-sm" data-user="Estudiante" data-code-loan="U2435P6N1856">
                            <i class="zmdi zmdi-file-text"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="../process/DeleteLoan.php" method="post" class="form_SRCB" data-type-form="delete" style="width: 8%;">
                            <input type="hidden" value="U30101996P7N6001" name="LoanKey">
                            <input type="hidden" value="Personal" name="UserType">
                            <button type="submit" class="btn btn-danger btn-raised btn-sm">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-info btn-file-loan btn-raised btn-sm" data-user="Personal" data-code-loan="U30101996P7N6001">
                            <i class="zmdi zmdi-file-text"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation" class="text-center">
        <ul class="pagination">
            <li class="disabled">
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="active">
                <a href="adminloan.php?pagina=1">1</a>
            </li>                    
            <li class="disabled">
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>