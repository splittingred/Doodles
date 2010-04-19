<?php
/**
 * @package doodles
 * @subpackage controllers
 */
require_once dirname(dirname(__FILE__)).'/model/doodles/doodles.class.php';
$doodles = new Doodles($modx);
return $doodles->initialize('mgr');