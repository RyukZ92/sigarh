<?php
session_start();
ob_start();
require_once "db/dbPdo.php";
require_once "config/config.php";
require_once "librarys/notificaciones/notificaciones.php";
require_once "views/layouts/default/index.php";
ob_end_flush();