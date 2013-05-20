<?php
namespace ZfcDatagrid\Renderer\PrintHtml;

use ZfcDatagrid\Renderer\AbstractRenderer;
use Zend\Http\Response;
use Zend\Http;
use Zend\View\Model\ViewModel;

class Renderer extends AbstractRenderer
{

    protected $template = 'zfc-datagrid/renderer/printHtml/layout';

    public function setTemplate ($name = 'zfc-datagrid/renderer/printHtml/layout')
    {
        $this->template = (string) $name;
    }

    public function getTemplate ()
    {
        return $this->template;
    }

    public function isExport ()
    {
        return true;
    }

    public function isHtml ()
    {
        return true;
    }

    /**
     *
     * @return Response\Stream
     */
    public function execute ()
    {
        $layout = $this->getViewModel();
        $layout->setTemplate($this->getTemplate());
        $layout->setTerminal(true);
        
        $table = new ViewModel();
        $table->setTemplate('zfc-datagrid/renderer/printHtml/table');
        $table->setVariables($layout->getVariables());
        
        $layout->addChild($table, 'table');
        
        return $layout;
        
//         $viewModel->setTemplate('zfc-datagrid/renderer/printHtml/layout');
        
//         $viewChild = new ViewModel();
//         $viewChild->setVariables($viewModel->getVariables());
//         $viewChild->setTemplate($this->getTemplate());
        
        
        
//         $viewModel->addChild($viewChild, 'table');
        
//         return $viewModel;
    }
}
