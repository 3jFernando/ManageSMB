<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link href="./include/plancss_silab.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome.min.css">
    <link rel="stylesheet" href="./assets/fonts/brands.min.css">
    <link rel="stylesheet" href="./assets/fonts/solid.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="./src/app.js"></script>

</head>

<body>

    <?php

        // incluir archivos necesarios
        include('./src/server.php');

        // modals
        include('./src/components/modals.php');

    ?>

        <!-- modales -->
        <?php echo $modalViewFile; ?>
    
        <nav class="navbar navbar-expand-lg navbar-info bg-info">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">ManageFiles</a>
               <?php 
               if($statusServer) {
                echo "Conectado";
                echo $pathRoot;
               } else {
                echo "Conexión fallida";
               } ?>
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-user text-dark" ></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <span class="navbar-text text-white">Salir <i class="fa fa-arrow-right"></i></span>
                </div>
            </div>
        </nav>

        <section>
            <main class="main">

                <div class="d-flex justify-content-between align-items-center">                

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">             
                        <li class="breadcrumb-item">
                            <a href="index.php?folder=/&endpoint=/">
                            <i class="fa fa-home"></i>Home</a>
                            <?php echo $endpoint_folder ?>
                        </li>
                    </nav>

                </div>                

                <table class="tabla-folders table table-hover">
                    <thead>
                        <tr>
                            <th width="6%">#</th>
                            <th width="55%">Nombre</th>
                            <th width="20%">Tipo</th>
                            <th width="19%">Tamaño</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($files as $file) {                            

                            $weight = $file['weight'];                            
                            $icon = '<i class="fas fa-file text-warning" style="margin-right: 6px;"></i>';
                            $btnOpenFolder = $icon.'<span style="margin-left: 4px;">'.$file['title'].'</span></a>';

                            if($file['type'] == "CARPETA") {
                                $icon = '<i class="fas fa-folder text-info" style="margin-right: 6px;"></i>';
                                $weight = '--';
                                
                                $btnOpenFolder = '
                                    <form action="index.php" method="post">
                                    <input type="hidden" name="nav_conexion_temp"  value="'.$conexion_temp.'"/>
                                    <input type="hidden" name="nav_is" value="1"/>
                                    <input type="hidden" name="nav_folder" value="'.$file['title'].'"/>
                                    <button style="border: 0;background: white; "type="submit">'.$icon.$file['title'].'</button>
                                    </form>
                                    ';

                            } 
                        
                            echo '
                                <tr class="'.$classType.'">
                                    <td>'.$file['id'].'</td>                                    
                                    <td>'.$btnOpenFolder.'</td>
                                    <td>'.$file['type'].'</td>
                                    <td>'.$weight.'</td>
                                </tr>    
                            ';                 
                        }
                    ?>
                    </tbody>
                </table>

                <br>
                <p>
                    <?php echo $cantFolders; ?> Carpeta/s y
                    <?php echo $cantFiles; ?> Archivo/s</p>

            </main>

            <footer class="footer">
                <span>Manage-files 2021. Desarrollado por</span> <a class="ml-1" href="www.claros-soluciones.com"> CLAROS SOLUCIONES</a>
            </footer>

        </section>

</body>

</html>