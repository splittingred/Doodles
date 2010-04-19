<?php
/**
 * @package doodle
 * @subpackage processors
 */

/* get obj */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('doodles.doodle_err_ns'));
$doodle = $modx->getObject('Doodle',$scriptProperties['id']);
if (empty($doodle)) return $modx->error->failure($modx->lexicon('doodles.doodle_err_nf'));

/* remove */
if ($doodle->remove() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_remove'));
}


return $modx->error->success('',$doodle);