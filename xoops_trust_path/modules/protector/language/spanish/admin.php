<?php
// Traducci�n al espa�ol por Colossus, www.zonadepruebas.com

// mymenu


// Appended by Xoops Language Checker -GIJOE- in 2009-01-14 11:10:52
define('_AM_ADV_DBFACTORYPATCHED', 'Su sistema est� preparado para evitar inyecciones SQL por intercepci�n en la capa de base de datos.');
define('_AM_ADV_DBFACTORYUNPATCHED', 'Su sistema no est� preparado para evitar inyecciones SQL por intercepci�n en la capa de base de datos. Se necesitan algunos parches.');

// Appended by Xoops Language Checker -GIJOE- in 2008-12-03 11:47:19
define('_AM_ADV_TRUSTPATHPUBLIC', 'Si puede ver una imagen con el texto -NG- sobre estas l�neas, o si el enlace funciona devolviendo un texto de advertencia, el directorio XOOPS_TRUST_PATH no est� configurado correctamente. Lo mejor es colocar el directorio XOOPS_TRUST_PATH fuera del DocumentRoot. Si no puede hacerlo, como segunda mejor alternativa deber�a crearse un fichero .htaccess (DENY FROM ALL) dentro del directorio XOOPS_TRUST_PATH.');
define('_AM_ADV_TRUSTPATHPUBLICLINK', 'Comprobar si los ficheros .php dentro de  TRUST_PATH son privados (el enlace debe devolver un error 403, 404 o 500)');

// Appended by Xoops Language Checker -GIJOE- in 2007-10-18 05:36:24
define('_AM_LABEL_COMPACTLOG', 'Log compacto');
define('_AM_BUTTON_COMPACTLOG', '�Comp�ctalo!');
define('_AM_JS_COMPACTLOGCONFIRM', 'Los duplicados (IP,Type) ser�n eliminados');
define('_AM_LABEL_REMOVEALL', 'Eliminar todas las entradas');
define('_AM_BUTTON_REMOVEALL', '�Eliminar todos!');
define('_AM_JS_REMOVEALLCONFIRM', 'Todos los logs se eliminan por completo. �Realmente est� seguro?');

// Appended by Xoops Language Checker -GIJOE- in 2007-07-30 05:37:51
define('_AM_FMT_CONFIGSNOTWRITABLE', 'Dar permisos de escritura al directorio configs: %s');

define('_MD_A_MYMENU_MYTPLSADMIN', '');
define('_MD_A_MYMENU_MYBLOCKSADMIN', 'Permisos');
define('_MD_A_MYMENU_MYPREFERENCES', 'Preferencias');

// index.php
define("_AM_TH_DATETIME", "Hora");
define("_AM_TH_USER", "Usuario");
define("_AM_TH_IP", "IP");
define("_AM_TH_AGENT", "AGENTE");
define("_AM_TH_TYPE", "Tipo");
define("_AM_TH_DESCRIPTION", "Descripci�n");

define("_AM_TH_BADIPS", 'IPs malos<br /><br /><span style="font-weight:normal;">Escriba cada IP en una l�nea.<br />Todo en blanco significa que todos las IPs son permitidas.</span>') ;

define("_AM_TH_GROUP1IPS", 'IPs permitidas para Grupo=1<br /><br /><span style="font-weight:normal;">Escriba cada IP en una l�nea.<br />192.168. significa 192.168.*<br />Todo en blanco significa que todos las IPs son permitidas.</span>') ;

define("_AM_LABEL_REMOVE", "Eliminar los registros marcados:") ;
define("_AM_BUTTON_REMOVE", "�Eliminar!") ;
define("_AM_JS_REMOVECONFIRM", "�Est� seguro de la eliminaci�n?") ;
define("_AM_MSG_IPFILESUPDATED", "Los archivos de IPs fueron actualizados") ;
define("_AM_MSG_BADIPSCANTOPEN", "El archivo para IPs malos no puede ser abierto") ;
define("_AM_MSG_GROUP1IPSCANTOPEN", "El archivo para permitir Grupo=1 no puede ser abierto") ;
define("_AM_MSG_REMOVED", "Registros eliminados") ;


// prefix_manager.php
define("_AM_H3_PREFIXMAN", "Administrador de prefijos") ;
define("_AM_MSG_DBUPDATED", "�Base de datos actualizada exitosamente!") ;
define("_AM_CONFIRM_DELETE", "Todos los datos ser�n eliminados. �Es correcto?") ;
define("_AM_TXT_HOWTOCHANGEDB", "Si desea cambiar el prefijo,<br /> edite %s/mainfile.php manualmente.<br /><br />define('XOOPS_DB_PREFIX', '<b>%s</b>');") ;


// advisory.php
define("_AM_ADV_NOTSECURE", "No es seguro");

define("_AM_ADV_REGISTERGLOBALS", "Esta configuraci�n invita a una variedad de ataques por inyecci�n.<br />Si puede instalar .htaccess, edite o cree...");
define("_AM_ADV_ALLOWURLFOPEN", "Esta configuraci�n permite a atacantes ejecutar c�digos arbitrarios en servidores remotos.<br />S�lo un administrador puede cambiar esta opci�n.<br />Si es administrador, edite php.ini o httpd.conf.<br /><b>Ejemplo de httpd.conf:<br /> &nbsp; php_admin_flag &nbsp; allow_url_fopen &nbsp; off</b><br />De lo contrario, p�daselo a sus administradores.");
define("_AM_ADV_USETRANSSID", "Su ID de sesi�n ser� mostrada en etiquetas ancla, etc.<br />Para evitar el secuestro de sesi�n, a�ada una l�nea en el archivo .htaccess de la ra�z de XOOPS.<br /><b>php_flag session.use_trans_sid off</b>");
define("_AM_ADV_DBPREFIX", "Esta configuraci�n invita a 'inyecciones de SQL'.<br />No olvide encender 'Forzar limpieza *' en las preferencias del m�dulo.");
define("_AM_ADV_LINK_TO_PREFIXMAN", "Ir a Admin. de prefijos");
define("_AM_ADV_MAINUNPATCHED", "Debe editar mainfile.php tal y como como recomienda el fichero README.");

define("_AM_ADV_SUBTITLECHECK", "Revisi�n de Protector");
define("_AM_ADV_CHECKCONTAMI", "Contaminaciones");
define("_AM_ADV_CHECKISOCOM", "Comentarios Aislados");
