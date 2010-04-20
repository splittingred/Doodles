<?php
/**
 * Resolve creating custom db tables during install.
 *
 * @package doodles
 * @subpackage build
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('doodles.core_path',null,$modx->getOption('core_path').'components/doodles/').'model/';
            $modx->addPackage('doodles',$modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('Doodle');

            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;