<?php

namespace Micuenta\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Micuenta\Model\Producto;


class ProductoController extends AbstractActionController{
    
      
    protected $_objectManager;
    
    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }
    
    
    public function indexAction()
    {
            $productos = $this->getObjectManager()->getRepository('\Micuenta\Model\Producto')->findAll();
            $tipospapeles = $this->getObjectManager()->getRepository('\Micuenta\Model\TipoPapel')->findAll();
            
            return new ViewModel(array('productos' => $productos, 'tipospapeles' => $tipospapeles));
    }
    
    
    public function addAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $agregar = $request->getPost('agregar', 'Cancelar');
            
            if ($agregar === 'Agregar') {
                
                $producto = new Producto();
                $producto->setNombre($this->getRequest()->getPost('nombre'));
                $producto->setDescripcion($this->getRequest()->getPost('descripcion'));
                $producto->setPixelHorizontalMinimo($this->getRequest()->getPost('pixelhorizmin'));
                $producto->setPixelVerticalMinimo($this->getRequest()->getPost('pixelvertmin'));
                $producto->setPixelHorizontalRecomendado($this->getRequest()->getPost('pixelhorizrec'));
                $producto->setPixelVerticalRecomendado($this->getRequest()->getPost('pixelvertrec'));
                $producto->setMmHorizontal($this->getRequest()->getPost('mmhorizontal'));
                $producto->setMmVertical($this->getRequest()->getPost('mmvertical'));
                $producto->setPeso($this->getRequest()->getPost('peso'));
                $producto->setOrden($this->getRequest()->getPost('orden'));
                $producto->setCodigo($this->getRequest()->getPost('codigo'));
                $selectPapel = $this->getObjectManager()->getRepository('\Micuenta\Model\TipoPapel')->find( $_POST['tipopapel']);
                $producto->setTipoPapel($selectPapel);
                
                if (isset($_POST['disponible'])){
                    $producto->setDisponible(TRUE);
                }  else {
                    $producto->setDisponible(FALSE);
                }
                $this->getObjectManager()->persist($producto);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('producto');
    
        }
        $tipospapeles = $this->getObjectManager()->getRepository('\Micuenta\Model\TipoPapel')->findAll();
        
        return new ViewModel(array('tipospapeles' => $tipospapeles));
    }
    
    
    public function editAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $producto = $this->getObjectManager()->find('\Micuenta\Model\Producto', $id);
        $id_papel_asociado = $producto->getTipoPapel()->getId();

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $producto->setNombre($this->getRequest()->getPost('nombre'));
                $producto->setDescripcion($this->getRequest()->getPost('descripcion'));
                $producto->setPixelHorizontalMinimo($this->getRequest()->getPost('pixelhorizmin'));
                $producto->setPixelVerticalMinimo($this->getRequest()->getPost('pixelvertmin'));
                $producto->setPixelHorizontalRecomendado($this->getRequest()->getPost('pixelhorizrec'));
                $producto->setPixelVerticalRecomendado($this->getRequest()->getPost('pixelvertrec'));
                $producto->setMmHorizontal($this->getRequest()->getPost('mmhorizontal'));
                $producto->setMmVertical($this->getRequest()->getPost('mmvertical'));
                $producto->setPeso($this->getRequest()->getPost('peso'));
                $producto->setOrden($this->getRequest()->getPost('orden'));
                $producto->setCodigo($this->getRequest()->getPost('codigo'));
                $selectPapel = $this->getObjectManager()->getRepository('\Micuenta\Model\TipoPapel')->find( $_POST['tipopapel']);
                $producto->setTipoPapel($selectPapel);
                
                if (isset($_POST['disponible'])){
                    $producto->setDisponible(TRUE);
                }  else {
                    $producto->setDisponible(FALSE);
                }
                $this->getObjectManager()->persist($producto);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('producto');
        }
        $tipospapeles = $this->getObjectManager()->getRepository('\Micuenta\Model\TipoPapel')->findAll();
        
        return new ViewModel(array('producto' => $producto, 'tipospapeles' => $tipospapeles,'id_papel_asociado' => $id_papel_asociado));
    }
    
    
    
    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $producto = $this->getObjectManager()->find('\Micuenta\Model\Producto', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $del = $request->getPost('del', 'Cancelar');
            
            if ($del === 'Eliminar') {
                $this->getObjectManager()->remove($producto);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('producto');
        }
        return new ViewModel(array('producto' => $producto));

    }

}
