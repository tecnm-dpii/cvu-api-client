<?php

use TecNM_DPII\CVU_API_Client\TnmApiClient;
use TecNM_DPII\CVU_API_Client\TnmCvuApiScopes;

$config_path = 'path/to/config/api.json';
$client = new TnmApiClient($config_path);

// SERVICIOS Y RECURSOS

// Obtener sólo el programa con ID 25
$programa = $client->academica->programas->consultarPorId(25);
// Obtener todos los programas en el sistema
$programas = $client->academica->programas->consultar();
// Obtener con parámetros opcionales
$programas = $client->academica->programas->consultar(array(
    'id_grado' => 1,        // programa con id_grado = 1
    'grados' => [1, 2, 3],    // programa con id_grado 1, 2 o 3
    'grado' => 'Maestría',  // programa de grado Maestría
    'posgrado' => true,     // programa que sea de nivel posgrado
    'posgrado' => false,    // programa que no sea posgrado
    'id_institucion' => 22, // programa de la institución con ID 22,
    'id_plantel' => 28,     // programa del plantel con ID 28,
    'key-index' => true     // Coloca el ID del programa como clave en el arreglo.
));

// LGACS OBSOLETAS A PARTIR DE NOVIEMBRE DE 2017
// Obtener sólo la LGAC con ID
$lgac = $client->academica->lgacs->consultarPorId(244);
// Obtener todas las LGACs
$lgacs = $client->academica->lgacs->consultar();
// Obtener las lgacs que cumplan parámetro de filtro
$lgacs = $client->academica->lgacs->consultar(array(
    'registrada_desde' => '2015-03-01', // LGACs cuyo registró ocurrió el 1 de marzo de 2015 o posterior
    'registrada_hasta' => '2015-03-01', // LGACs cuyo registro ocurrió el 1 de marzo de 2015 o antes.
    'vence_desde' => '2016-08-01',      // LGACs cuya vigencia termina a partir del 1 de agosto de 2016.
    'vence_hasta' => '2016-08-01',      // LGACs cuya vigencia terminó antes o el 1 de agosto de 2016.
    'vigente_renovacion_en' => '2017-03-01', // LGACs cuya vigencia de renovación termina el 1 de marzo de 2017.
    'id_institucion' => 3,  // LGACs registradas a la institución con ID 3.
    'id_plantel' => 44,     // LGACs registradas al plantel con ID 44.
    'id_programa' => 35,    // LGACs registradas al programa con ID 35.
    'key-index' => true,    // Coloca el ID de la lgac como clave en el arreglo resultado.
));

// NUEVAS LGACS, VIGENTES A PARTIR DE NOVIEMBRE DE 2017
// Obtener lgac por el ID especificado
$lgac2 = $client->academica->lgacs2->consultarPorId(43);
// Consultar todas las LGACS
$lgacs2 = $client->academica->lgacs2->consultar();
// Consultar LGACs que cumplen criterio de filtro
$lgacs2 = $client->academica->lgacs2->consultar(array(
    'registrada_desde' => '2015-03-01', // LGACs cuyo registró ocurrió el 1 de marzo de 2015 o posterior
    'registrada_hasta' => '2015-03-01', // LGACs cuyo registro ocurrió el 1 de marzo de 2015 o antes.
    'vence_desde' => '2016-08-01',      // LGACs cuya vigencia termina a partir del 1 de agosto de 2016.
    'vence_hasta' => '2016-08-01',      // LGACs cuya vigencia terminó antes o el 1 de agosto de 2016.
    'vigente_renovacion_en' => '2017-03-01', // LGACs cuya vigencia de renovación termina el 1 de marzo de 2017.
    'id_institucion' => 3,  // LGACs registradas a la institución con ID 3.
    'id_plantel' => 44,     // LGACs registradas al plantel con ID 44.
    'id_programa' => 35,    // LGACs registradas al programa con ID 35.
    'key-index' => true,    // Coloca el ID de la lgac como clave en el arreglo resultado.
));
// Únicamente válido para aplicación de registro de LGACs de la DPII
$bool = $client->academica->lgacs2->colocar(23, array(
    'id_lgac' => 34,
    'id_plantel' => 45,
    'id_programa' => 21,
    'id_cat_lgac' => 67,
    'inicio_vigencia' => '2017-11-01',
    'fin_vigencia' => '2020-10-31',
    'create_time' => '2017-10-17 15:46:32',
    'update_time' => '2017-10-17 15:46:32'
));

// MENSAJES A CVU-TecNM (DEPRECATED)
$bool = $client->aplicacion->mensajes->enviar(array(
    'cvu_tecnm' => 'IT15A001', // requerido
    'witch_email' => false // No envía correos
));
// Obtener por el ID
// Sólo se recuperar los mensajes enviados por la aplicación
$mensajes = $client->aplicacion->mensajes->consultar(30);
// Obtener con filtro
$mensajes = $client->aplicacion->mensajes->listar(array(
    'cvu_tecnm' => 'IT15A001' // Filtrar por el CVU-TecNM
));

// USUARIOS DE CVU-TECNM
// Obtener nombre y apellidos del usuario CVU-TecNM utilizado
$usuario = $client->aplicacion->usuarios->buscar('IT15A001');

// Consultar todos los tipos con parámetros opcionales
$tipos_investigacion = $client->catalogos->tipos_investigacion->consultar(['key-index' => true]);
// Consultar el tipo de investigación con ID 4
$tipo_investigacion = $client->catalogos->tipos_investigacion->consultarPorId(4);

// Consultar todas las áreas de conocimiento con parámetros opcionales
$areas_conocimiento = $client->catalogos->areas_conocimiento->consultar(['key-index' => true]);
// Consultar el área de conocimiento con ID 2
$area_conocimiento = $client->catalogos->areas_conocimiento->consultarPorId(2);

// Consultar todas las instituciones con parámetros opcionales
$instituciones = $client->catalogos->instituciones->consultar(array(
    'order-by' => 'nombre', // Ordena las instituciones por nombre
    'sin-id' => [32, 54],    // Omite las instituciones que tengan los ID 32 y 54
    'key-index' => true     // Coloca el ID de la institución como clave en el arreglo resultado
));
// Consultar las instituciones con ID 22
$institucion = $client->catalogos->instituciones->consultarPorId(22);


$client->catalogos->unidades_organicas->consultarPorId(19);
$client->catalogos->unidades_organicas->consultar(array(
    'id-institucion' => 3,
    'order-by' => 'nombre',
    'sin-id' => [34],
    'key-index' => true
));


$client->catalogos->puestos->consultarPorId(32);
$client->catalogos->puestos->consultar(array(
    'id-unidad-organica' => 19,
    'order-by' => 'nombre',
    'sin-id' => [10, 12, 56],
    'key-index' => true
));

$client->catalogos->clasificador->consultarCapitulos(array(
    'nest-up-to' => 'partidas-genericas',
    'capitulos' => [2000, 3000],
    'conceptos' => [2100, 3100],
    'partidas-genericas' => [21700, 31900],
    'partidas-especificas' => [21701, 31903],
    'key-index' => true
));
$client->catalogos->clasificador->consultarCapitulo(2000);

// =============================================================================
//
//  ENLACE DE CVU-TECNM CON PERFIL DE USUARIO
//
// =============================================================================

// Crear enlace para acceso a CVU-TecNM
// Para consultar más Scopes revisar archivo TnmCvuApiScopes.php
$auth_uri = $client
    ->setRedirectUri("uri/to/oauth2/response")
    ->addScope(TnmCvuApiScopes::DATOS_PERSONALES)
    ->addScope(TnmCvuApiScopes::DATOS_LABORALES)
    ->addScope(TnmCvuApiScopes::FORMACION_ACADEMICA)
    ->createAuthUrl();

?>

<a href='<?= $auth_uri ?>'>Acceder a CVU-TecNM</a>

<?php

// Para procesar la respuesta de acceso a CVU-TecNM
// uri/to/oauth2/response

// Los access token tienen duraciones cortas de unos pocos minutos.
// utilizar el refresh token para obtener nuevos access tokens.
// Se puede almacenar un refresh token en base de datos para obtener acceso
// sin necesidad de volver a solicitar las credenciales del usuario.

$code = $_GET['code'];
$access_token = $client->authenticate($code);

$datos_personales = $client->cvu->perfil->datos_personales->consultar();

$_SESSION['access_token'] = $access_token;

$refresh_token = $client->getRefreshToken();

// En cualquier archivo que se requiera obtener acceso a CVU-TecNM.
// Para reutilizar access_token con la variable de sesión

if (!empty($_SESSION['access_token'])) {
    $client->setAccessToken($_SESSION['access_token']);
}

// Obtener nuevo access token a partir de refresh_token desde base de datos.
$access_token = $client->fetchAccessTokenWithRefreshToken($refresh_token);
$client->setAccessToken($access_token);

// Consultar datos personales del perfil
$client->cvu->perfil->datos_personales->consultar();

// Consultar una la adscripción con ID 122
$client->cvu->datos_laborales->adscripciones->consultarPorId(122);

$client->cvu->datos_laborales->adscripciones->consultar(array(
    'id_institucion' => 22, // Cuando el id_institucion sea 22
    'id_plantel' => 22, // Equivalente a id_institucion
    'vigente' => true, // La adscripción marcada como vigente
    'unchecked' => true, // Se especifica para traer registros incluso cuando no ha pasado la validación del TecNM.
));
$client->cvu->datos_laborales->adscripciones->listar(); // alias de consultar

$client->cvu->datos_laborales->plazas->consultarPorId(4322);

$client->cvu->datos_laborales->plazas->consultar(array(
    'adscripcion' => 323, // Cuando el id_adscripción sea 323
    'asignado_desde' => '2018-03-01', // Cuando fecha_asignacion sea igual o posterior al 1 de marzo de 2018
    'asignado_hasta' => '2018-09-18', // Cuando fecha_asignacion sea igual o anterior a 18 de septiembre de 2018
    'ptc' => true,    // Traer plazas correspondientes a tiempo completo.
    'ptc' => false, // traer plazas que no correspondan a tiempo completo
    'vigente' => true, // Traer plazas que se encuentren vigentes
    'vigente' => false, // Traer plazas cuando ya no estén vigentes
    'clave_movimiento' => 10, // Cuando el tipo de movimiento (alta) sea 10
    'clave_movimiento' => [10, 95], // Cuando el tipo de movimiento sea 10 o 95
    'cvu_modificado_hasta' => '2017-05-31', // Cuando la última modificación sea igual o anterior a 31 de mayo de 2018
    'unchecked' => true, // Para obtener registros cuando no han sido validados por el TecNM.
));


$client->cvu->formacion_academica->estudios->consultar(array(
    'cvu_registrado_desde' => '2016-02-01', // Cuando la fecha de registro sea igual o posterior al 1 de febrero de 2016,
    'cvu_registrado_hasta' => '2017-12-31', // Cuando la fecha de registro sea igual o anterior al 31 de diciembre de 2017
    'cvu_modificado_desde' => '2017-06-16', // Cuando la fecha de modificacion sea igual o posterior al 16 de junio de 2017
    'cvu_modificado-hasta' => '2017-10-15', // cuando la fecha de modificación sea igual o anterior al 15 de octubre de 2017
    'unchecked' => true, // Para obtener registros cuando no han sido validados por el TecNM.
));


$client->cvu->conacyt->registro->consultar();

$client->cvu->conacyt->sni->consultar(array(
    'cvu_registrado_desde' => '2018-01-01', // Cuando la fecha de registro sea igual o posterior al 1 de enero de 2018
    'cvu_registrado_hasta' => '2018-04-30', // Cuando la fecha de registro sea igual o anterior al 30 de abril de 2018
    'cvu_modificado_desde' => '2017-11-01', // Cuando la fecha de modificación sea igual o posterior al 1 de noviembre de 2018
    'cvu_modificado_hasta' => '2018-05-15', // Cuando la fecha de modificación sea igual o anterior al 15 de mayo de 2018
    'unchecked' => true, // Para ignorar el estado de validación del TecNM.
));
$client->cvu->conacyt->sni->listar(array(
    'vigente_en' => '2018-03-31', // Cuando esté vigente en la fecha 31 de marzo de 2018
    'unchecked' => true, // Para obtener registros cuando no han sido validados por el TecNM.
));

$client->cvu->prodep->registro->consultar();

$client->cvu->prodep->perfil_deseable->consultar(array(
    'cvu_registrado_desde' => '2017-10-20', // Cuando la fecha de registro sea igual o posterior al 20 de octubre de 2017
    'cvu_registrado_hasta' => '2017-12-31', // Cuando la fecha de registro sea igual o anterior al 31 de diciembre de 2017
    'cvu_modificado_desde' => '2017-11-01', // Cuando la fecha de modificación sea igual o posterior al 1 de noviembre de 2017
    'cvu_modificado_hasta' => '2017-12-31', // Cuando la fecha de modificación sea igual o anterior al 31 de diciembre de 2017
    'unchecked' => true // Para ignorar el estado de validación del TecNM
));
$client->cvu->prodep->perfil_deseable->listar(array(
    'vigente_en' => '2018-09-19', // Cuando la vigencia del perfil deseable incluya a la fecha señalada
    'unchecked' => true, // Para obtener los registros incluyendo aquellos sin validar por el TecNM.
));

$client->cvu->prodep->cuerpos_academicos->consultar(array(
    'vigente_en' => '2018-03-31', // Cuando la vigencia del cuerpo académico sea activa el 31 de marzo de 2018
    'institucion' => 22, // Cuando el ID de la institución sea 22
    'id_nivel' => 2, // Cuando el ID del nivel sea 2
    'miembro' => 'IT15A001', // Cuando alguno de los miembros tenga clave cvu_tecnm IT15A001
    'responsable' => 'IT16A019', // Cuando el responsable tenga clave cvu_tecnm IT16A019
    'colaborador' => 'IT15A013', // Cuando alguno de los colaboradores tenga clave cvu_tecnm IT15A013
    'cvu_modificado_hasta' => '2018-09-19', // Cuando la fecha de modificación sea igual o anterior al 19 de septiembre de 2018
    'unchecked' => true, // Para obtener registros incluso cuando no han pasado la validación del TecNM.
));

$client->cvu->prodep->cuerpos_academicos->consultarPorId(323, array(
    'con_miembros' => true, // Para obtener las claves de CVU-TecNM de los integrantes del cuerpo académico.
));

$client->cvu->prodep->cuerpos_academicos->consultarPorClave('CA-COL-001', array(
    'cvu_miembros' => true // Para obtener las claves de CVU-TecNM de los Integrantes del Cuerpo Académico.
));

$client->cvu->prodep->niveles_cuerpo_academico->listar();

$client->cvu->prodep->areas->listar();
