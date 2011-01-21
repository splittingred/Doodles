<?php
/**
 * Build the setup options form.
 *
 * @package doodles
 * @subpackage build
 */
/* set some default values */

/* get values based on mode */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        break;
    case xPDOTransport::ACTION_UPGRADE:
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

/* do output html */
$output = '
<h2>Doodles Installer</h2>
<p>Thanks for installing Doodles! Please review the setup options below before proceeding.</p>
<br />
';


return $output;