<?php
/**
 * @package doodles
 * @subpackage controllers
 */
require_once dirname(__FILE__) . '/model/doodles/doodles.class.php';
abstract class DoodlesManagerController extends modExtraManagerController {
    /** @var Doodles $doodles */
    public $doodles;
    public function initialize() {
        $this->doodles = new Doodles($this->modx);

        $this->addCss($this->doodles->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->doodles->config['jsUrl'].'mgr/doodles.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            Doodles.config = '.$this->modx->toJSON($this->doodles->config).';
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('doodles:default');
    }
    public function checkPermissions() { return true;}
}
/**
 * @package doodles
 * @subpackage controllers
 */
class IndexManagerController extends DoodlesManagerController {
    public static function getDefaultController() { return 'home'; }
}