<?php
// Representa el conector con el cliente. Toda la información necesaria por el cliente que provenga del servidor es guardada en este archivo de configuración. Posteriormente puede ser devuelto por un JSON en el controlador principar de la aplicación

return array(
		
	/*
	|--------------------------------------------------------------------------
	| Services URL's
	|--------------------------------------------------------------------------
	| 
	| Proveen las urls de acceso a los servicios que la aplicación
	| implementa.
	|
	*/
	'Services' => array(
		'resources' => '/resources',
		'profile' 	=> '/profile'
	)
);