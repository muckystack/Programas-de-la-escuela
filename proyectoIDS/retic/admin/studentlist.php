<?php
    include('include/header.php');
    include('include/sidebar.php');
    include('data/student_model.php');
    
    $search = isset($_POST['search']) ? $_POST['search']: null;
    $student = $student->getstudent($search);
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>LISTA DE ALUMNOS</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        Lista de Alumnos
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="form-inline form-padding">
                    <form action="studentlist.php" method="post">
                        <input type="text" class="form-control" name="search" placeholder="Buscar Alumnos...">
                        <button type="submit" name="submitsearch" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>                                          
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addstudent"><i class="fa fa-user"></i> Agregar Alumno</button>
                    </form>
                </div>
            </div>
        </div>
        <!--/.row -->
        <hr />   
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($_GET['r'])): ?>
                    <?php
                        $r = $_GET['r'];
                        if($r=='added'){
                            $class='success';   
                        }else if($r=='updated'){
                            $class='info';   
                        }else if($r=='deleted'){
                            $class='danger';   
                        }else if($r=='added an account'){
                            $class='success';   
                        }else{
                            $class='hide';
                        }
                    ?>
                    <div class="alert alert-<?php echo $class?> <?php echo $classs; ?>">
                        <strong>1 Alumno Agregado Correctamente <?php echo $r; ?>!</strong>    
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. de Control</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
								<th>Facebook</th>
								<th>Correo</th>
								<th>Teléfono</th>
								<th>Semestre</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 1; ?>
                            <?php while($row = mysql_fetch_array($student)): ?>                            
                                <tr>
                                    <td><?php echo $c;?></td>
                                    <td><a href="edit.php?type=student&id=<?php echo $row['id']?>"><?php echo $row['studid'];?></a></td>
                                    <td><?php echo $row['fname'];?></td>
                                    <td><?php echo $row['lname'];?></td>
									<td><?php echo $row['face'];?></td>
									<td><?php echo $row['correo'];?></td>
									<td><?php echo $row['telefono'];?></td>
									<td><?php echo $row['semestre'];?></td>
									
                                    <td class="text-center">
                                        <a href="data/settings_model.php?q=addaccount&level=student&id=<?php echo $row['id']?>" class="confirmacc"><i class="fa fa-key fa-2x text-warning"></i></a>
                                        <a href="studentsubject.php?id=<?php echo $row['id'];?>" title="Update Subject"><i class="fa fa-bar-chart-o fa-2x text-success"></i></a> &nbsp;
                                        <a href="data/data_model.php?q=delete&table=student&id=<?php echo $row['id']?>" title="Remove"><i class="fa fa-times-circle fa-2x text-danger confirmation"></i></a></td>
                                </tr>
                            <?php $c++; ?>
                            <?php endwhile; ?>
                            <?php if(mysql_num_rows($student) < 1): ?>
                                <tr>
                                    <td colspan="5" class="bg-danger text-danger text-center">*** EMPTY ***</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->    
<?php include('include/modal.php'); ?>
<?php include('include/footer.php'); ?>