<?php

namespace Micuenta\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Micuenta\Model\FormaPago;


class FormapagoController extends AbstractActionController{
    
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
            $formaspago = $this->getObjectManager()->getRepository('\Micuenta\Model\FormaPago')->findAll();
            
            
            return new ViewModel(array('formaspago' => $formaspago));
    }
    
    
    public function addAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $agregar = $request->getPost('agregar', 'Cancelar');
            
            if ($agregar === 'Agregar') {
                
                $formapago = new FormaPago();
                $formapago->setCodigo($this->getRequest()->getPost('codigo'));
                $formapago->setNombre($this->getRequest()->getPost('nombre'));
                $formapago->setDescripcion($this->getRequest()->getPost('descripcion'));
                
                
                if (isset($_POST['disponible'])){
                    $formapago->setDisponible(TRUE);
                }  else {
                    $formapago->setDisponible(FALSE);
                }
                $this->getObjectManager()->persist($formapago);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('formapago');
    
        }
        
        
        return new ViewModel();
    }
    
    
    public function editAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $formapago = $this->getObjectManager()->find('\Micuenta\Model\FormaPago', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $formapago->setCodigo($this->getRequest()->getPost('codigo'));
                $formapago->setNombre($this->getRequest()->getPost('nombre'));
                $formapago->setDescripcion($this->getRequest()->getPost('descripcion'));
                
                if (isset($_POST['disponible'])){
                    $formapago->setDisponible(TRUE);
                }  else {
                    $formapago->setDisponible(FALSE);
                }
                $this->getObjectManager()->persist($formapago);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('formapago');
        }
        
        
        return new ViewModel(array('formapago' => $formapago));
    }
    
    
    
    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $formapago = $this->getObjectManager()->find('\Micuenta\Model\FormaPago', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $del = $request->getPost('del', 'Cancelar');
            
            if ($del === 'Eliminar') {
                $this->getObjectManager()->remove($formapago);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('formapago');
        }
        return new ViewModel(array('formapago' => $formapago));

    }

}
