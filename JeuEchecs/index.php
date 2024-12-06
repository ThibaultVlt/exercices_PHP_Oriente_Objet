<?php

use App\Autoload;
use App\Pièces\PieceEchecs;

require_once 'classes/Autoload.php';
Autoload::register();

    $piece = new PieceEchecs(1, 2, 1);

