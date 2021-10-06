<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link href="./include/plancss_silab.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome.min.css">
    <link rel="stylesheet" href="./assets/fonts/brands.min.css">
    <link rel="stylesheet" href="./assets/fonts/solid.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="./src/app.js"></script>

</head>

<body class="body-manage-files">

    <?php

        // incluir archivos necesarios
        include('./src/server.php');

        // modals
        //include('./src/components/modals.php');
        

    ?>

        <!-- modales -->
        <?php echo $modalViewFile; ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-success" href="/SMB"><b>ManageFiles</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <?php 
                        if($statusServer) {
                            echo '<span class="text-success">Conectado, Usuario: '.$user.' | Host: '.$host.'</span>';
                        } else {
                            echo '<span class="text-danger">Conexión fallida</span>';
                        } 
                    ?>
                    </li>
                </ul>
                <a href="/SMB"><span class="navbar-text text-danger">Salir <i class="fa fa-arrow-right"></i></span></a>
            </div>
        </nav>

        <!-- rutas -->
        <nav class="m-0 breadcrumb-nav-routes" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    RUTA: <?php echo 'Inicio'.$changeFolder; ?>
                </li>
            </ol>
        </nav> 

        <section>
            <main class="main">

                <div class="d-flex justify-content-between align-items-center mb-2"> 

                    <button type="button" class="btn btn-sm btn-outline-light text-dark" onclick="window.history.back()">
                        <i class="fa fa-chevron-left mr-2"></i> Regresar
                    </button>  

                    <div class="d-flex justify-content-end align-items-center">
                        <button type="button" class="btn btn-sm btn-light">
                            <i class="fa fa-folder mr-2"></i> Carpetas <span class="badge badge-light text-success"><?php echo $cantFolders; ?></span>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ml-2">
                            <i class="fa fa-file mr-2"></i> Archivos <span class="badge badge-light text-success"><?php echo $cantFiles; ?></span>
                        </button>
                    </div>
                </div>   

                <?php 
                    if($fileDownloaded && $downloadFile) { 
                        echo '<div onclick="this.remove()" class="b-0 card card-body shadow-sm pb-0"><p>'.$fileDownloadedMessage.'<a href="assets/files/'.$downloadFileTargetTitle.'" target="_blank" class="ml-2 btn btn-sm btn-outline-success"><i class="fa fa-file-download mr-2"></i> Descargar</a></p></div>';
                     }
                ?>

                <div class="shadow-sm p-2">
                    <table class="tabla-folders table table-hover ">
                        <thead>
                            <tr>
                                <th width="50%">Nombre</th>
                                <th width="20%">Tipo</th>
                                <th width="19%">Tamaño</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($files as $file) {                            

                                $weight = $file['weight'];                            
                                $icon = '<i class="fas fa-file text-warning" style="margin-right: 6px;"></i>';
                                $btnOpenFolder = '
                                <form action="index.php" method="post">
                                <input type="hidden" name="downloadFIle" value="SI"/>
                                <input type="hidden" name="user" value="'.$_COOKIE['User'].'"/>
                                <input type="hidden" name="password" value="'.$_COOKIE['Pass'].'"/>
                                <input type="hidden" name="host" value="'.$_COOKIE['Host'].'"/>
                                <input type="hidden" name="workgroup" value="'.$_COOKIE['Work'].'"/>
                                <input type="hidden" name="share" value="'.$_COOKIE['Folder'].'"/>
                                <input type="hidden" name="downloadFileTarget" value="'.$changeFolder.'/'.$file['title'].'"/>
                                <input type="hidden" name="downloadFileTargetTitle" value="'.$file['title'].'"/>
                                <button style="border: 0;background: transparent; "type="submit">'.$icon.$file['title'].'</button>
                                </form>';

                                if($file['type'] == "CARPETA") {
                                    $icon = '<i class="fas fa-folder text-success" style="margin-right: 6px;"></i>';
                                    $weight = '--';
                                    
                                    $btnOpenFolder = '
                                    <form action="index.php" method="post">
                                    <input type="hidden" name="downloadFIle" value="NO"/>
                                        <input type="hidden" name="user" value="'.$_COOKIE['User'].'"/>
                                        <input type="hidden" name="password" value="'.$_COOKIE['Pass'].'"/>
                                        <input type="hidden" name="host" value="'.$_COOKIE['Host'].'"/>
                                        <input type="hidden" name="workgroup" value="'.$_COOKIE['Work'].'"/>
                                        <input type="hidden" name="share" value="'.$_COOKIE['Folder'].'"/>
                                        <input type="hidden" name="changeFolder" value="'.$changeFolder.'/'.$file['title'].'"/>
                                        <button style="border: 0;background: transparent; "type="submit">'.$icon.$file['title'].'</button>
                                    </form>
                                    ';

                                } 
                            
                                echo '
                                    <tr class="'.$classType.'">                                 
                                        <td>'.$btnOpenFolder.'</td>
                                        <td>'.$file['type'].'</td>
                                        <td>'.$weight.'</td>
                                    </tr>    
                                ';                 
                            }
                        ?>
                        </tbody>
                    </table>
                </div>

            </main>

            <footer class="footer">
                <span>© Copyright ManageFiles 2021, Software MCS.</span> 
                <a class="ml-1" target="_blank" href="https://www.claros-soluciones.com"> Desarrollado por CLAROS SOLUCIONES</a>
            </footer>

        </section>

</body>

</html>