<?php
    include('include/header.php');
    include('include/sidebar.php');
    include('data/settings_model.php');
    
    $search = isset($_POST['search']) ? $_POST['search']: null;
    $user = $settings->getuser($search);
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Ajustes <small>Usuarios</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        Usuarios
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($_GET['r']) && $_GET['r']=='deleted'): ?>
                    <div class="alert alert-danger">
                        <strong>1 account successfully removed!</strong>
                    </div>
                <?php endif; ?>
                <div class="form-inline form-padding">
                    <form action="users.php" method="post">
                        <input type="text" class="form-control" name="search" placeholder="Buscar Usuario">
                        <button type="submit" name="submitsearch" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>                                                                 
                    </form>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead><tr>
                            <th>Usuario</th>    
                            <th>Nombre</th>    
                            <th>Nivel</th>    
                            <th>Password</th>    
                            <th>Quitar</th>    
                        </tr></thead>
                        <tbody>
                        <?php while($row = mysql_fetch_array($user)): ?>
                            <tr>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['lname'].', '.$row['fname'];?></td>
                                <td><?php echo $row['level'];?></td>
                                <td><a href="settings.php?username=<?php echo $row['username'];?>">Actualizar</a></td>
                                <td><a href="data/data_model.php?q=delete&table=userdata&id=<?php echo $row['id']?>" title="Remove" class="text-danger confirmation">Quitar</a></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->    
<?php include('include/footer.php');