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
            
            $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $email_ingresado = $this->getRequest()->getPost('email');
            
            $contrasenia_ingresada = $this->getRequest()->getPost('contrasenia');
            $email_valido = false;
            $contrasenia_valida = false;
            $i = 0;
            $j = 0;

            while ($i < count($users)){
                if ($users[$i]->getEmail() == $email_ingresado){
                    $j = $i;
                    $this->setCodigo($j);
                    $id = $users[$i]->getId();
                    $email_valido = true;
                    break;    
                    } 
                $i++;
            }
            
            if ($email_valido){
                if ($users[$j]->getContrasenia() == $contrasenia_ingresada){
                    
                    return $this->redirect()->toRoute('user', array('action'=>'cuenta'),
                            array('query' => array('id' => $id),
                           ));
                    
                }
            }
            
            

        }

            return new ViewModel(array('users' => $users));
        
    }
    
    
    public function loginAction()
    {
        $users = $this->getObjectManager()->getRepository('\Micuenta\Model\Usuario')->findAll();
            
            $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $email_ingresado = $this->getRequest()->getPost('email');
            
            $contrasenia_ingresada = $this->getRequest()->getPost('contrasenia');
            $email_valido = false;
            $contrasenia_valida = false;
            $i = 0;
            $j = 0;

            while ($i < count($users)){
                if ($users[$i]->getEmail() == $email_ingresado){
                    $j = $i;
                    $this->setCodigo($j);
                    $id = $users[$i]->getId();
                    $email_valido = true;
                    break;    
                    } 
                $i++;
            }
            
            if ($email_valido){
                if ($users[$j]->getContrasenia() == $contrasenia_ingresada){
                    
                    return $this->redirect()->toRoute('user', array('action'=>'cuenta'),
                            array('query' => array('id' => $id),
                           ));
                    
                }
            }
            
            

        }

            return new ViewModel(array('users' => $users));
        
        
    }


    
    public function cuentaAction()
    {
        $ii = $this->params()->fromQuery('id');

        $usuario1 = $this->getObjectManager()->find('\Micuenta\Model\Usuario', $ii);

        
        return new ViewModel(array('usuario1' => $usuario1));
        
        
    }
    
    
    
    public function addAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $agregar = $request->getPost('agregar', 'Cancelar');
            
            if ($agregar === 'Agregar') {
                
                $user = new Usuario();
                $user->setNombre($this->getRequest()->getPost('nombre'));
                $user->setApellido($this->getRequest()->getPost('apellido'));
                $user->setEmail($this->getRequest()->getPost('email'));
                $user->setContrasenia($this->getRequest()->getPost('contrasenia'));

                $this->getObjectManager()->persist($user);
                $this->getObjectManager()->flush();
                $newId = $user->getId();
            }
            
            return $this->redirect()->toRoute('home');
        }
        
        return new ViewModel();
    }
    
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $user = $this->getObjectManager()->find('\Micuenta\Model\Usuario', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $user->setNombre($this->getRequest()->getPost('nombre'));
                $user->setApellido($this->getRequest()->getPost('apellido'));
                $user->setEmail($this->getRequest()->getPost('email'));
                $user->setContrasenia($this->getRequest()->getPost('contrasenia'));

                $this->getObjectManager()->persist($user);
                $this->getObjectManager()->flush();
            }
            

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('user' => $user));
    }
    
    
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $user = $this->getObjectManager()->find('\Micuenta\Model\Usuario', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $del = $request->getPost('del', 'Cancelar');
            
            if ($del === 'Eliminar') {
                
                $this->getObjectManager()->remove($user);
                $this->getObjectManager()->flush();
            }
            
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
    
    
    public function setUsuarioActual($uu){
        
        $this->usuarioActual = $uu;
        
        return $this;
    }
    
    
    public function getUsuarioActual()
    {
        return $this->usuarioActual;
    }
    
   
}


