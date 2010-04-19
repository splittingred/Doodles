<?php
/**
 * @package doodles
 * @subpackage processors
 */
$doodle = $modx->newObject('Doodle');
$doodle->fromArray($scriptProperties);

/* save */
if ($doodle->save() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_save'));
}


return $modx->error->success('',$doodle);