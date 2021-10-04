<?php

?>

<!DOCTYPE html>

<html lang="es">

<meta http-equiv="Content-Type" content="text/html" charset="utf-8">

<link href="./include/plancss_silab.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="./include/jquery-1.8.2.js"></script>

<script type="text/javascript" src="./mcs.js"></script>

<head> 

	<style>

	section>div	{clear:both;}

	.group		{overflow:hidden;padding:2px;width:100%; ;margin-left: auto; margin-right: auto;}

	section .group:nth-child(odd) {background:#e5e5e5; width:100%; ;margin-left: auto; margin-right: auto;}

	.directory	{width:100%; }

	.name		{float:left;width:700px;overflow:hidden;font-family:Helvetica,Futura,Arial,Verdana,sans-serif;font-size:12px;font-weight:bold;}

	.mime		{float:left;width:5%;}

	.size		{float:right;}

	.bold		{margin-left: auto; margin-right: auto;}

	footer		{text-align:center;margin-top:20px;color:#808080;}

	a:link		{text-decoration:none;color:#000000;}

	</style>

</head>

 

<body>

<?php

// obtenemos la ruta a revisar, y la ruta anterior para volver...



if($_GET["path"])

	{

	//print_r($_GET["path"]);

	

	$path=$_GET["path"];

	

	$back=implode("/",explode("/",$_GET["path"],-2));

	if($back)

		$back.="/*";

	else

		$back="./pdf/ghm/docu/*";

		//$back="ftp://192.168.1.39/INFO_SISTEMAS/*";

	}else{

		$path="./pdf/ghm/docu/*";

		//$path="ftp://192.168.1.39/INFO_SISTEMAS/*";

	}

?>

<header>

	<!--<h1>Explorador de archivos en PHP</h1>-->

</header>

<nav>

	<p>&nbsp;</p>

</nav>

 

<section>

	<?php

	// si no estamos en la raiz, permitimos volver hacia atras

	if($path!="*")

		echo "<div class='bold group' valign='center'><a href='?path=".strtoupper($back)."'><<<</a><br></div>";

 

	// devuelve el tipo mime de su extensión (desde PHP 5.3)

	$finfo1 = finfo_open(FILEINFO_MIME_TYPE);

	// devuelve la codificación mime del fichero (desde PHP 5.3)

	$finfo2 = finfo_open(FILEINFO_MIME_ENCODING);

 

	$folder=0;

	$file=0;

	# recorremos todos los archivos de la carpeta

	foreach (glob($path) as $filename)

	{

		$fileMime=finfo_file($finfo1, $filename);

		$fileEncoding=finfo_file($finfo2, $filename);

		if($fileMime=="directory")

		{

			$folder+=1;

			// mostramos la carpeta y permitimos pulsar sobre la misma

			echo "<div class='directory group'>";

			if($fileMime=="directory"){

				echo"<div class='mime'><img src='../imag/carp.png' width='18' height='18' border='0' title='Carpeta de Archivos'/></a></div>";

			}

			

			$dividir = explode(" ",end(explode("/",$filename)));

			

			if ($dividir[0] == 30001){

				$title = utf8_decode("Plantilla con breve descripción de los sistemas operativos existentes en del Dpto. (N/A Para normas ISO), se revisa que el contenido exigido este de una manera clara. La empresa utiliza el ERP-SIGAP; pero los DPTOS contables y  de GH, tienen uno en específico, el primero utiliza SIIGO y el segundo DESIGNER. Verificar que la información este actualizada con la Gerencia de Procesos.");

			} elseif ($dividir[0] == 30002){

				$title = utf8_decode("Plantilla con Breve reseña del sistema gerencial existente en el Dpto. (N/A Para normas ISO), pero se revisa que el contenido exigido este de una manera clara; para la compañía es el ERP-SIGAP. Verificar que la información este actualizada con la Gerencia de Procesos.");

			} elseif ($dividir[0] == 30003){

				$title = utf8_decode("Se verifica que este el plan de trabajo anual presentando por el DPTO, Si no aplica es reemplazado por el cronograma de actividades, (En plantilla establecida: en WORD para el plan y en EXCEL para el CRONOGRAMA): (ver plantillas con la Gerencia de Procesos), en el cronograma se verifica que este actualizado y trazado, en el plan se verifica que sea del año actual y cumpla la estructura exigida por la alta gerencia; esta puede ser avalada con la Gerencia de procesos.");

			} elseif ($dividir[0] == 30004){

				$title = utf8_decode("se valida la Estructura orgánica del DPTO, se verificando que este en la plantilla establecida (ver plantilla con la Gerencia de Procesos), que los datos correspondan de acuerdo al ADN  del departamento; el cual se verifica con la Gerencia de PROCESOS  y a los datos arrojados por GH, que no solo serán los numéricos, sino también de cómo está la estructura del departamento dentro del ORGANIGRAMA de la compañía esta información se solicita en GH.");

			} elseif ($dividir[0] == 30005){

				$title = utf8_decode("Se debe encontrar  los perfiles de cargo existentes del DPTO, se revisa que los perfiles  concuerden con la estructura orgánica del departamento, que estén actualizados según las requisiciones de las normas (ISO 9001-2015, OHSAS (18000/45000, 14001 y 17025), esta información se puede corroborar con la dirección HSEQ, además que el formato utilizado sea el correcto de acuerdo a lo estipulado en el SGC, esto también se corrobora con la dirección de HSEQ.");

			} elseif ($dividir[0] == 30006){

				$title = utf8_decode("La estructura salarial del DPTO (Autorizada por la alta gerencia), se verifica que este actualizado bajo las directrices de la alta gerencia para asignación salarial, se verifica con el DPTO de GH. (No aplica para revisión con ISO)");

			} elseif ($dividir[0] == 30007){

				$title = utf8_decode("Se debe encontrar  la carpeta que contiene los documentos requeridos por la compañía de cada uno de los trabajadores del departamento, se toma una muestra significativa de las carpetas y se valida  contra el check list  CONTROL DOCUMENTOS, (este check list reposa en la carpeta No 14 del bloque 3 de ANÁLISIS, SEGUIMIENTO Y CONTROL DOCUMENTAL del módulo gerencial, en donde se puede verificar ampliamente que Norma ISO verifica que documentos y los aspectos a tener en cuenta. ");

			} elseif ($dividir[0] == 30008){

				$title = utf8_decode("KNOW HOW");

			} elseif ($dividir[0] == 30009){

				$title = utf8_decode("Se verifica que el cronograma de capacitación del departamento este actualizado y ajustado de acuerdo al seguimiento que realiza el departamento de GH, por lo tanto se valida con este último tanto el contenido como el formato que cumpla con el SGC.");

			} elseif ($dividir[0] == 30010){

				$title = utf8_decode("Se verifica que estén mes a mes los informes semanales  y las actas de reuniones de arranque del Dpto, bajo la estructura concebida por la alta gerencia, ver estructura con la Gerencia de Procesos.");

			} elseif ($dividir[0] == 30011){

				$title = utf8_decode("Son los productos del departamento y que surten información a otros, al director, gerencias y alta gerencia, se verifica el listado, contenido y formatos con el director o gerencia encargada; preferiblemente con la Gerencia encargada.");

			} elseif ($dividir[0] == 30012){

				$title = utf8_decode("Se verifica que este ingresada la matriz de comunicación del departamento en donde se especifica (Aspectos a comunicar, responsable de la comunicación, a quien comunica y medios a utilizar); aplican para NORMAS ISO 90001-17025, esta matriz es administrada por el departamento quien debe tenerla actualizada y bajo el formato establecido por el SGC, se puede verificar con la Gerencia encargada y con la dirección de HSEQ.");

			} elseif ($dividir[0] == 30013){

				$title = utf8_decode("Se verifica que este la matriz del departamento este ingresada tanto la de HSEQ como la interna dos archivos en el Excel, la primera cumple una estructura especifica con el SGC, la segunda es un formato sencillo que no bajo el SGC se pueden verificar ambos con la dirección de HSEQ.");

			} elseif ($dividir[0] == 30014){

				$title = utf8_decode("Se encuentran las guías para realizar las auditorias, el paso a paso, informes y documentación en general del aseguramiento y control interno realizado a cada departamento.");

			} else {

				$title = utf8_decode("Descripción");

			}

			

			echo"

				<a href='?path=".$filename."/*' class='name' title='".$title."'>".end(explode("/",$filename))."</a>

				<!--<div class='mime'>(".$fileEncoding.")</div>-->

				</div>";

		}else{

			$file+=1;

			// mostramos la información del archivo

			echo "<div class='group'>";

			if(end(explode(".",$filename))=='pdf'){

				echo"<div class='mime'><img src='../imag/pdf_01.png' width='18' height='18' border='0' title='Formato Pdf'/></a></div>";

			}elseif(end(explode(".",$filename))=='pptx'){

				echo"<div class='mime'><img src='../imag/pptx.png' width='18' height='18' border='0' title='Formato Power Point'/></a></div>";

			}elseif(end(explode(".",$filename))=='docx'){

				echo"<div class='mime'><img src='../imag/docx.png' width='18' height='18' border='0' title='Formato Word'/></a></div>";

			}elseif(end(explode(".",$filename))=='xlsx'){

				echo"<div class='mime'><img src='../imag/xlsx.png' width='18' height='18' border='0' title='Formato Excel'/></a></div>";

			}

			echo"

				<div class='size'>".number_format(filesize($filename)/1024,2,",",".")." Kb</div>

				<div class='name'><a href='".$filename."' target='_blank'>".end(explode("/",$filename))."</a></div>";

			echo "

				

				<!--<div class='mime'>".end(explode(".",$filename))."</div>-->

				</div>";

		}

	}

 

	finfo_close($finfo1);

	finfo_close($finfo2);

	?>

	<footer>

		<?php echo $folder?> Carpeta/s y <?php echo $file?> Archivo/s

		<p>&nbsp;</p>

	</footer>

</section>

 

</body>

</html>

<?php

?>