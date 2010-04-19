<?php
/**
 * @package doodles
 * @subpackage build
 */
$snippets = array();

/* course snippets */
$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'Doodles',
    'description' => 'Displays a list of Doodles.',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.doodles.php'),
),'',true,true);
unset($properties);

return $snippets;