<?php
/**
 * Loads the home page.
 *
 * @package doodles
 * @subpackage controllers
 */
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/widgets/doodles.grid.js');
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/widgets/home.panel.js');
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/sections/index.js');

$output = '<div id="doodles-panel-home-div"></div>';

return $output;
