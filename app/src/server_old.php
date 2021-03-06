/*
// validar la url que se esta visitando seria el folder actual
$folder = getcwd(); // directorio actua

$endpoint = $_GET['endpoint']; // directorio que se quiere visitar
$endpointFolder = $_GET['folder']; // directorio que se quiere visitar
$endpoint_folder = $endpoint ? $endpoint : $folder; // control, si no llega nada se daja el actual de lo contrario el que llegue
$endpoint_folder .= '/'; // se agrega un / para separar los directorios
$filesInFolder = scandir($endpoint_folder); // archivos. Parametro: ,1 cambia el orden
$cantFolders = 0; // cantidad de carpetas
$cantFiles = 0; // cantidad de archivos
$files = []; // todos los archivos
$codif = "ISO-8859-1";

// verificacion de contenido
$tempsFolders = [];
$tempsFiles = [];

foreach($filesInFolder as $key => $file) {                    

    // archivos validos
    if($key > 0 && $file != '.DS_Store') {

        $path = $endpoint_folder.$file;
        $type = is_dir($path) ? true : false;        
     
        // verificar si son carpetas o archivos
        if($type) {
            $cantFolders += 1;
        } else { 
            $cantFiles += 1;
        }

        // calcular el tamño del archivo
        $weight = filesize($file)." bytes";


        // archivos
        $file_tamp = [
            "id" => $key,
            "title" => $file,
            "type" => mime_content_type($path), // $type ? "CARPETA" : "ARCHIVO" true: folder, false: file            
            "weight" => $weight,
            "address" => $endpoint_folder,      
            "path" => 'http://localhost:8888'.$path,
            "content" => manageContentFile($path)      
        ];

        if($type) {
            $tempsFolders[] = $file_tamp;
        } else {
            $tempsFiles[] = $file_tamp;
        }

    }
} 

// organizar archivos por tipo, primero las carpetas
$files = array_merge($tempsFolders, $tempsFiles);

// explorar contenido del archivo seleccionado
function manageContentFile($path) {      

    //abrimos un buffer para leer el archivo
    ob_start();
    readfile($path);
    
    //volcamos el buffer en una variable
    $content = ob_get_contents();

    //limpiamos el buffer
    ob_clean();

    //retornamos el contenido después de limpiarlo
    //aplicando la codificación seleccionada
    return base64_encode(htmlentities($content, ENT_QUOTES, $codif));
}

*/