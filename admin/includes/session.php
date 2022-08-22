<?php
session_start();
require_once("includes/dbController.php");
$db_handle = new DBController();

require_once("includes/send_report.php");
