<?php
/**
 * Loads the header for mgr pages.
 *
 * @package doodles
 * @subpackage controllers
 */
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/doodles.js');
$modx->regClientStartupHTMLBlock('<script type="text/javascript">
Ext.onReady(function() {
    Doodles.config = '.$modx->toJSON($doodles->config).';
    Doodles.config.connector_url = "'.$doodles->config['connectorUrl'].'";
    Doodles.request = '.$modx->toJSON($_GET).';
});
</script>');


return '';