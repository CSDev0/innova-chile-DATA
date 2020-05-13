<?php

function controllers_autoload($classname) {
    require 'classes/' . $classname . '.php';
    }

spl_autoload_register('controllers_autoload');
