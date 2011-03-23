<?php
/**
 * @package doodle
 * @subpackage processors
 */
/* parse JSON */
if (empty($scriptProperties['data'])) return $modx->error->failure($modx->lexicon('doodles.doodle_err_data'));
$_DATA = $modx->fromJSON($scriptProperties['data']);
if (!is_array($_DATA)) return $modx->error->failure($modx->lexicon('doodles.doodle_err_data'));

/* get obj */
if (empty($_DATA['id'])) return $modx->error->failure($modx->lexicon('doodles.doodle_err_ns'));
$doodle = $modx->getObject('Doodle',$_DATA['id']);
if (empty($doodle)) return $modx->error->failure($modx->lexicon('doodles.doodle_err_nf'));

$doodle->fromArray($_DATA);

/* save */
if ($doodle->save() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_save'));
}


return $modx->error->success('',$doodle);