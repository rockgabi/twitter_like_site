<?php 

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used
	| by the validator class. Some of the rules contain multiple versions,
	| such as the size (max, min, between) rules. These versions are used
	| for different input types such as strings and files.
	|
	| These language lines may be easily changed to provide custom error
	| messages in your application. Error messages for custom validation
	| rules may also be added to this file.
	|
	*/

	"accepted"       => "El :attribute debe ser aceptado.",
	"active_url"     => "El :attribute no es una URL valida.",
	"after"          => "El :attribute debe be una fecha posterior a :date.",
	"alpha"          => "El :attribute debe solamente contener letras.",
	"alpha_dash"     => "El :attribute debe solamente contener letras, numeros y barras.",
	"alpha_num"      => "El :attribute debe solamente contener letras y numeros",
	"array"          => "El :attribute debe tener seleccionado elementos.",
	"before"         => "El :attribute debe debe ser una fecha anterior a :date.",
	"between"        => array(
		"numeric" => "El :attribute debe be between :min - :max.",
		"file"    => "El :attribute debe be between :min - :max kilobytes.",
		"string"  => "El :attribute debe be between :min - :max characters.",
	),
	"confirmed"      => "El :attribute confirmation does not match.",
	"count"          => "El :attribute debe have exactly :count selected elements.",
	"countbetween"   => "El :attribute debe have between :min and :max selected elements.",
	"countmax"       => "El :attribute debe have less than :max selected elements.",
	"countmin"       => "El :attribute debe have at least :min selected elements.",
	"different"      => "El :attribute and :other debe be different.",
	"email"          => "El :attribute format is invalid.",
	"exists"         => "El selected :attribute is invalid.",
	"image"          => "El :attribute debe be an image.",
	"in"             => "El selected :attribute is invalid.",
	"integer"        => "El :attribute debe be an integer.",
	"ip"             => "El :attribute debe be a valid IP address.",
	"match"          => "El :attribute format is invalid.",
	"max"            => array(
		"numeric" => "El :attribute debe be less than :max.",
		"file"    => "El :attribute debe be less than :max kilobytes.",
		"string"  => "El :attribute debe be less than :max characters.",
	),
	"mimes"          => "El :attribute debe be a file of type: :values.",
	"min"            => array(
		"numeric" => "El :attribute debe be at least :min.",
		"file"    => "El :attribute debe be at least :min kilobytes.",
		"string"  => "El :attribute debe be at least :min characters.",
	),
	"not_in"         => "El :attribute seleccionado es invalido.",
	"numeric"        => "El :attribute debe ser un numero.",
	"required"       => "El campo :attribute es requerido.",
	"same"           => "El :attribute y :other deben coincidir.",
	"size"           => array(
		"numeric" => "El :attribute debe contener :size.",
		"file"    => "El :attribute debe ser de :size kilobyte.",
		"string"  => "El :attribute debe contener :size caracteres.",
	),
	"unique"         => "El :attribute ya ha sido tomado.",
	"url"            => "El formato de :attribute es invalido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute_rule" to name the lines. This helps keep your
	| custom validation clean and tidy.
	|
	| So, say you want to use a custom validation message when validating that
	| the "email" attribute is unique. Just add "email_unique" to this array
	| with your custom message. The Validator will handle the rest!
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". Your users will thank you.
	|
	| The Validator class will automatically search this array of lines it
	| is attempting to replace the :attribute place-holder in messages.
	| It's pretty slick. We think you'll like it.
	|
	*/

	'attributes' => array(),

);