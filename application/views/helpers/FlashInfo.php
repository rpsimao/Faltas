<?php
/**
 * 
 * Enter description here ...
 * 
 * @author Ricardo Sim�o - ricardo.simao@fterceiro.pt
 * @copyright 2011 - Fernandes & Terceiro, SA
 * @copyright All right reserved.
 * @license Although this script is provided with source code it does NOT mean that this report is in the public domain.
 * 
 * @version 1.0 - Oct 2, 2012 10:47:15 AM
 * 
 * @category Printshop
 * @package 
 * 
 */
require_once 'Zend/View/Interface.php';

/**
 * FlashInfo helper
 *
 * @uses viewHelper Application_View_Helper
 */
class Application_View_Helper_FlashInfo 
{

    const ALERT_ERROR = "alert alert-error";

    const ALERT_INFO = "alert alert-info";

    const ALERT_SUCCESS = "alert alert-success";

    const ICON_OK = "icon-ok-sign";

    const ICON_INFO = "icon-info-sign";

    const ICON_ERROR = "icon-warning-sign";

    /**
     *
     * @var Zend_View_Interface
     */
    public $view;

    /**
     */
    public function FlashInfo ($mode, $msg)
    {
        switch ($mode) {
            case "error":
                return $this->_htmlcode(
                        array(
                                'divclass' => self::ALERT_ERROR,
                                'iconclass' => self::ICON_ERROR,
                                'msg' => $msg
                        ));
                break;
            
            case "success":
                return $this->_htmlcode(
                        array(
                                'divclass' => self::ALERT_SUCCESS,
                                'iconclass' => self::ICON_OK,
                                'msg' => $msg
                        ));
                break;
            
            case "info":
                return $this->_htmlcode(
                        array(
                                'divclass' => self::ALERT_INFO,
                                'iconclass' => self::ICON_INFO,
                                'msg' => $msg
                        ));
                break;
        }
    }

    /**
     * Sets the view field
     *
     * @param $view Zend_View_Interface            
     */
    public function setView (Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    private function _htmlcode (array $info)
    {
        $html = '<div class="' . $info["divclass"] .
                 '" id="default_flash_message"><button type="button" class="close" data-dismiss="alert">×</button><p><i class="' .
                 $info["iconclass"] . '"></i><b> ' . $info["msg"] .
                 '</b></p></div>';
        
        return $html;
    }
}
