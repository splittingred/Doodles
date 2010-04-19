<?php
/**
 * Loads the home page.
 *
 * @package doodles
 * @subpackage controllers
 */
$modx->regClientStartupScript($tlc->config['jsUrl'].'mgr/widgets/doodles.panel.js');
$modx->regClientStartupScript($tlc->config['jsUrl'].'mgr/sections/index.js');

$output = '<div id="tlc-panel-home-div"></div>';

return $output;
