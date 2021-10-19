<!DOCTYPE html>
<html lang="es">
<head>
   <title>ManageFiles | Acceso </title>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./app/assets/css/styles.css">
    <link rel="stylesheet" href="./app/assets/fonts/fontawesome.min.css">
    <link rel="stylesheet" href="./app/assets/fonts/brands.min.css">
    <link rel="stylesheet" href="./app/assets/fonts/solid.min.css">
</head>
<body class="body-login">

   <div class="d-flex justify-content-center aling-items-center w-100 mt-4">
   
      <div class="card shadow-sm p-4" style="width: 450pt">
         <div class="text-center">
         <h4><b class="text-success">Acceder a ManageFiles</b></h4>
         </div>
         <br>

         <form action="app/index.php" method="post">
            <div class="row">
               <div class="col-sm-12 col-md-6 form-group">
                  <label for="user"><b>Ingresa el Usuario (*)</b></label><br>
                  <input type="text" name="user" class="form-control" value="leidy" required/> 
                  <small>Nombre de usuario del PC al que quieres acceder</small>
               </div>
               <div class="col-sm-12 col-md-6 form-group">
                  <label for="password"><b>Ingresa la Contraseña (*)</b></label><br>
                  <input type="text" name="password" class="form-control" value="petunia23" required/>
                  <small>Contraseña del PC al que quieres acceder</small>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-sm-12 col-md-6 form-group">
                  <label for="host"><b>Ingresa el Host (*)</b></label><br>
                  <input type="text" name="host" class="form-control" value="192.168.100.13" required/>
                  <small>Host/IP del PC al que quieres acceder</small>
               </div>
               <div class="col-sm-12 col-md-6 form-group">
                  <label for="workgroup"><b>Grupo de Trabajo (*)</b></label><br>
                  <input type="text" name="workgroup" class="form-control" value="WORKGROUP" required/>
                  <small>Grupo de Trabajo del PC al que quieres acceder</small>
                  </div>
            </div>
            <div class="form-group mt-2">
               <label for="share"><b>Ingresa el Directorio compartido (*)</b></label><br>
               <input type="text" name="share" class="form-control" value="" required/>
               <small>Nombre de la Carpeta que esta compartida en el otro PC</small>
            </div>
            <div class="w-100 d-flex justify-content-end aling-items-center mt-5">
               <button class="btn btn-success">
                  <span class="ml-2 text-white">Acceder</span> <i class="fa fa-arrow-right text-white"></i>
               </button>
            </div>
         </form>
      </div>
   </div>

   <footer class="footer">
      <span>© Copyright ManageFiles 2021, Software MCS.</span> 
      <a class="ml-1" target="_blank" href="https://www.claros-soluciones.com"> Desarrollado por CLAROS SOLUCIONES</a>
   </footer>
   <script>
      // Limpia los datos de local storage al cargar pagina principal
      window.onload = function() {
         localStorage.removeItem('firstLoad');
         document.cookie = "User=; path=/SMB/app";
         document.cookie = "Pass=; path=/SMB/app";
         document.cookie = "Host=; path=/SMB/app";
         document.cookie = "Work=; path=/SMB/app";
         document.cookie = "Folder=; path=/SMB/app";
      }
   </script>
</body>
</html>