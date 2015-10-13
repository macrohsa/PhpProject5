<?php

namespace Micuenta\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Micuenta\Model\Usuario;




class CuentaController extends AbstractActionController
{
    
    protected $_objectManager;
    
    
    public function indexAction()
    {
            $users = $this->getObjectManager()->getRepository('\Micuenta\Model\Usuario')->findAll();
            
            
            return new ViewModel(array('users' => $users));
        
    }
    
    
    
    public function addAction()
    {
        if ($this->request->isPost()) {
            $user = new Usuario();
            $user->setNombre($this->getRequest()->getPost('nombre'));
            $user->setApellido($this->getRequest()->getPost('apellido'));
            $user->setEmail($this->getRequest()->getPost('email'));
            $user->setContrasenia($this->getRequest()->getPost('contrasenia'));

            $this->getObjectManager()->persist($user);
            $this->getObjectManager()->flush();
            $newId = $user->getId();

            return $this->redirect()->toRoute('home');
        }
        
        return new ViewModel();
    }
    
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $user = $this->getObjectManager()->find('\Micuenta\Model\Usuario', $id);

        if ($this->request->isPost()) {
            $user->setNombre($this->getRequest()->getPost('nombre'));
            $user->setApellido($this->getRequest()->getPost('apellido'));
            $user->setEmail($this->getRequest()->getPost('email'));
            $user->setContrasenia($this->getRequest()->getPost('contrasenia'));

            $this->getObjectManager()->persist($user);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('user' => $user));
    }
    
    
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $user = $this->getObjectManager()->find('\Micuenta\Model\Usuario', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($user);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('user' => $user));
    }
    
    
    
    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }
    
   
}


