<?php
/**
 * @package doodles
 * @subpackage controllers
 */
require_once dirname(__FILE__) . '/model/doodles/doodles.class.php';
class IndexManagerController extends modExtraManagerController {
    public static function getDefaultController() { return 'home'; }
}
abstract class DoodlesManagerController extends modManagerController {
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