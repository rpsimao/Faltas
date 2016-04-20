
<?php 

require_once 'Zend/View/Interface.php';
/**
 * NavBar helper
 *
 * @uses viewHelper Application_View_Helper
 */
class Application_View_Helper_Search
{
    /**
     *
     * @var Zend_View_Interface
     */
    public $view;
    /**
     */
    
   
    
    public function Search ()
    {
        
      $this->html = '<div id="searchModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Pesquisa</h3>
          </div>
          <div class="modal-body">
            <form action="/search" method="POST">
           
              <table>
                  <tr>
                    <td>Nº <input type="text" class="input-small"></td>
                  </tr>
                   <tr>   
                   <td><label class="checkbox inline">
              <input type="checkbox" name="justificada" id="justificada" value="justificada"> Justificada
            </label>
             
            <label class="checkbox inline">
              <input type="checkbox" name="justificada" id="justificada" value="option1"> Injustificada
            </label>
            </td>
            </tr>
            <tr>
            <td><button type="submit" class="btn">Procurar</button></td>
            </tr>  
         
    </table>
</form>
              
              
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
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
