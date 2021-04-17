<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$autoload = function ($modelname) {
	if (Model::exists($modelname)) {
		include Model::getFullPath($modelname);
	}
};

spl_autoload_register($autoload);
