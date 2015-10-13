<?php

namespace Micuenta\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Micuenta\Model\Plan;
use Micuenta\Model\AlmacenamientoExtra;
use Micuenta\Model\DescuentoPlan;



class PlanController extends AbstractActionController{
    
    
    protected $_objectManager;
    
    
    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }
    
    
    /*
     * Funciones CRUD para Planes
     */
    
    public function indexAction()
    {
            $planes = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->findAll();
            
            $almacextras = $this->getObjectManager()->getRepository('\Micuenta\Model\AlmacenamientoExtra')->findAll();
            
            $descuentos = $this->getObjectManager()->getRepository('\Micuenta\Model\DescuentoPlan')->findAll();
            
            return new ViewModel(array('planes' => $planes, 'almacextras' => $almacextras, 'descuentos' => $descuentos));
        
    }
    
    
    
    public function addAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $agregar = $request->getPost('agregar', 'Cancelar');
            
            if ($agregar === 'Agregar') {
                
                $plan = new Plan();
                $plan->setCodigo($this->getRequest()->getPost('codigo'));
                $plan->setNombre($this->getRequest()->getPost('nombre'));
                $plan->setAlmacenamientoBasico($this->getRequest()->getPost('almacenamBasico'));
                $plan->setTamanioArchivo($this->getRequest()->getPost('tamanioArchivo'));
                $plan->setPrecio($this->getRequest()->getPost('precio'));
                if (isset($_POST['disponible'])){
                    $plan->setDisponible(TRUE);
                }  else {
                    $plan->setDisponible(FALSE);
                }

                $this->getObjectManager()->persist($plan);
                $this->getObjectManager()->flush();
                
            }

            return $this->redirect()->toRoute('plan');
        }
        
        return new ViewModel();
    }
    
    
    public function editAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $plan = $this->getObjectManager()->find('\Micuenta\Model\Plan', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $plan->setCodigo($this->getRequest()->getPost('codigo'));
                $plan->setNombre($this->getRequest()->getPost('nombre'));
                $plan->setAlmacenamientoBasico($this->getRequest()->getPost('almacenamBasico'));
                $plan->setTamanioArchivo($this->getRequest()->getPost('tamanioArchivo'));
                $plan->setPrecio($this->getRequest()->getPost('precio'));
                if (isset($_POST['disponible'])){
                    $plan->setDisponible(TRUE);
                }  else {
                    $plan->setDisponible(FALSE);
                }

                $this->getObjectManager()->persist($plan);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('plan');
        }
        return new ViewModel(array('plan' => $plan));
    }
    
    
    
    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $plan = $this->getObjectManager()->find('\Micuenta\Model\Plan', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $del = $request->getPost('del', 'Cancelar');
            
            if ($del === 'Eliminar') {
                $this->getObjectManager()->remove($plan);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('plan');
        }
        return new ViewModel(array('plan' => $plan));
    }
    
    
    /*
     * Funciones CRUD para Almacenamiento Extra
     */
    
    
    public function addalmacextraAction() {
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $agregar = $request->getPost('agregar', 'Cancelar');
            
            if ($agregar === 'Agregar') {
                
                $almacextra = new AlmacenamientoExtra();
                $almacextra->setAlmacenamExtra($this->getRequest()->getPost('almacenamExtra'));
                $almacextra->setPrecio($this->getRequest()->getPost('precio'));
                $selectPlan = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->find( $_POST['plan']);
                $almacextra->setPlan($selectPlan);

                $this->getObjectManager()->persist($almacextra);
                $this->getObjectManager()->flush();
            
            }

            return $this->redirect()->toRoute('plan');
        }
        
        $planes = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->findAll();
        
        return new ViewModel(array('planes' => $planes));
    }
    
    
    public function editalmacextraAction() {
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $almacextra = $this->getObjectManager()->find('\Micuenta\Model\AlmacenamientoExtra', $id);
        $id_plan_asociado = $almacextra->getPlan()->getId();
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $almacextra->setAlmacenamExtra($this->getRequest()->getPost('almacenamExtra'));
                $almacextra->setPrecio($this->getRequest()->getPost('precio'));
                $selectPlan = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->find( $_POST['plan']);
                $almacextra->setPlan($selectPlan);

                $this->getObjectManager()->persist($almacextra);
                $this->getObjectManager()->flush();
                
            }
            
            return $this->redirect()->toRoute('plan');
        }
        
        $planes = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->findAll();
        
        return new ViewModel(array('almacextra' => $almacextra,'planes' => $planes,'id_plan_asociado' => $id_plan_asociado));
    }
    
    
    public function deletealmacextraAction() {
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $almacextra = $this->getObjectManager()->find('\Micuenta\Model\AlmacenamientoExtra', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $del = $request->getPost('del', 'Cancelar');
            
            if ($del === 'Eliminar') {
                
                $this->getObjectManager()->remove($almacextra);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('plan');
        }
        
        
        return new ViewModel(array('almacextra' => $almacextra));
    }
    
    
    /*
     * Funciones CRUD para Descuentos
     */
    
    
    public function adddescuentoAction() {
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $agregar = $request->getPost('agregar', 'Cancelar');
            
            if ($agregar === 'Agregar') {
                
                $descuento = new DescuentoPlan();
                $descuento->setMesesPagados($this->getRequest()->getPost('meses'));
                $descuento->setPorcentaje($this->getRequest()->getPost('porcentaje'));
                $selectPlan = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->find( $_POST['plan']);
                $descuento->setPlan($selectPlan);

                $this->getObjectManager()->persist($descuento);
                $this->getObjectManager()->flush();
            }
            
            return $this->redirect()->toRoute('plan');
        }
        
        $planes = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->findAll();
        
        return new ViewModel(array('planes' => $planes));
    }
    
    
    public function editdescuentoAction() {
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $descuento = $this->getObjectManager()->find('\Micuenta\Model\DescuentoPlan', $id);
        $id_plan_asociado = $descuento->getPlan()->getId();
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $descuento->setMesesPagados($this->getRequest()->getPost('meses'));
                $descuento->setPorcentaje($this->getRequest()->getPost('porcentaje'));
                $selectPlan = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->find( $_POST['plan']);
                $descuento->setPlan($selectPlan);

                $this->getObjectManager()->persist($descuento);
                $this->getObjectManager()->flush();
                
            }
            
            return $this->redirect()->toRoute('plan');
        }
        
        $planes = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->findAll();
        
        return new ViewModel(array('descuento' => $descuento,'planes' => $planes,'id_plan_asociado' => $id_plan_asociado));
        
    }
    
    
    public function deletedescuentoAction() {
        
        $id = $this->params()->fromRoute('id', 0);
        $descuento = $this->getObjectManager()->find('\Micuenta\Model\DescuentoPlan', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $del = $request->getPost('del', 'Cancelar');
            
            if ($del === 'Eliminar') {
                
                $this->getObjectManager()->remove($descuento);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('plan');
        }
        return new ViewModel(array('descuento' => $descuento));
        
    }
    
    
}
