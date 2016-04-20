<?php 

require_once 'Zend/View/Interface.php';
/**
 * NavBar helper
 *
 * @uses viewHelper Application_View_Helper
 */
class Application_View_Helper_NavBar
{
    /**
     *
     * @var Zend_View_Interface
     */
    public $view;
    /**
     */
    
   
    
    public function NavBar ()
    {
        
      $this->html = '<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></a> 
                 <span class="brand">PEDIDO/JUSTIFICAÇÃO DE FALTA</span>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="/"><i class="icon-home icon-white"></i> Home</a></li>
                        <li><a href="/index/listagem"><i class="icon-list icon-white"></i> Listagem</a></li>
                     </ul>
                        <ul class="nav pull-right">
                        <li><a href="#searchModal" role="button" data-toggle="modal"><i class="icon-search icon-white"></i><span id="opcoesProcuraNavBar">Mostrar Opções</span></a></li>        
                      </ul>             
                </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>';
        return $this->html;
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
}

?>
