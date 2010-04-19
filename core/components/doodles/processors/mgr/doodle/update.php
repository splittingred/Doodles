<?php
/**
 * @package doodle
 * @subpackage processors
 */

/* get obj */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('doodles.doodle_err_ns'));
$doodle = $modx->getObject('Doodle',$scriptProperties['id']);
if (empty($doodle)) return $modx->error->failure($modx->lexicon('doodles.doodle_err_nf'));

/* set fields */
$doodle->fromArray($scriptProperties);

/* save */
if ($doodle->save() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_save'));
}


return $modx->error->success('',$doodle);