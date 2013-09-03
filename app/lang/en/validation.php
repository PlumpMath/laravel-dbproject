<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => ":attribute should be accepted.",
	"active_url"       => ":attribute is not a valid URL.",
	"after"            => ":attribute should be a date after :date.",
	"alpha"            => ":attribute may only contain letters.",
	"alpha_dash"       => ":attribute may only contain letters, numbers, and dashes.",
	"alpha_num"        => ":attribute may only contain letters and numbers.",
	"before"           => ":attribute should be a date before :date.",
	"between"          => array(
		"numeric" => ":attribute should be between :min - :max.",
		"file"    => ":attribute should be between :min - :max kilobytes.",
		"string"  => ":attribute should be between :min - :max characters.",
	),
	"confirmed"        => ":attribute confirmation does not match.",
	"date"             => ":attribute is not a valid date.",
	"date_format"      => ":attribute does not match format :format.",
	"different"        => ":attribute and :other should be different.",
	"digits"           => ":attribute should be :digits digits.",
	"digits_between"   => ":attribute should be between :min and :max digits.",
	"email"            => ":attribute should be an email.",
	"exists"           => "selected :attribute is invalid.",
	"image"            => ":attribute should be an image.",
	"in"               => ":attribute is invalid.",
	"integer"          => ":attribute should be an integer.",
	"ip"               => ":attribute should be a valid IP address.",
	"max"              => array(
		"numeric" => ":attribute may not be greater than :max.",
		"file"    => ":attribute may not be greater than :max kilobytes.",
		"string"  => ":attribute should be less than :max characters.",
	),
	"mimes"            => ":attribute should be a file of type: :values.",
	"min"              => array(
		"numeric" => ":attribute should be at least :min.",
		"file"    => ":attribute should be at least :min kilobytes.",
		"string"  => ":attribute should be more than :min characters.",
	),
	"not_in"           => ":attribute is invalid.",
	"numeric"          => ":attribute should be only digits.",
	"regex"            => ":attribute format is invalid.",
	"required"         => ":attribute is required.",
	"required_if"      => ":attribute field is required when :other is :value.",
	"required_with"    => ":attribute field is required when :values is present.",
	"required_without" => ":attribute field is required when :values is not present.",
	"same"             => ":attribute and :other should match.",
	"size"             => array(
		"numeric" => ":attribute should be :size.",
		"file"    => ":attribute should be :size kilobytes.",
		"string"  => ":attribute should be :size characters.",
	),
	"unique"           => "This :attribute has already been taken.",
	"url"              => ":attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'email' => 'Email',
		'phone' => 'Phone',
		'password' => 'Password',
		'address' => 'Address',
		'city' => 'City',
		'state' => 'State',
		'zip_code' => 'Zip Code',
	),

);
