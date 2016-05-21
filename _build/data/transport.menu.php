<?php
/**
 * Adds modActions and modMenus into package
 *
 * @package doodles
 * @subpackage build
 */
$action= $modx->newObject('modAction');
$action->fromArray(array(
    'id' => 1,
    'namespace' => 'doodles',
    'parent' => 0,
    'controller' => 'index',
    'haslayout' => true,
    'lang_topics' => 'doodles:default',
    'assets' => '',
),'',true,true);

$menu= $modx->newObject('modMenu');
$menu->fromArray(array(
    'text' => 'doodles',
    'parent' => 'components',
    'description' => 'doodles.desc',
    'icon' => 'images/icons/plugin.gif',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
    'action' => 'index',
    'namespace' => 'doodles'
),'',true,true);
// $menu->addOne($action);  -- this is how it worked in older modx
unset($menus);

return $menu;
