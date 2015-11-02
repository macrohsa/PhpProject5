<?php

namespace Micuenta\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Micuenta\Model\Fotografo;
use Micuenta\Model\DatosAcercaXFotografo;



class FotografoController extends AbstractActionController{
      
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
            $fotografos = $this->getObjectManager()->getRepository('\Micuenta\Model\Fotografo')->findAll();
            
            return new ViewModel(array('fotografos' => $fotografos));
    }
    

    public function addAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $agregar = $request->getPost('agregar', 'Cancelar');
            
            if ($agregar === 'Agregar') {
                
                $fotografo = new Fotografo();
                $fotografo->setNombre($this->getRequest()->getPost('nombre'));
                $fotografo->setApellido($this->getRequest()->getPost('apellido'));
                $fotografo->setEmpresa($this->getRequest()->getPost('empresa'));
                $fotografo->setEmail($this->getRequest()->getPost('email'));
                $fotografo->setContrasenia($this->getRequest()->getPost('contrasenia'));
                $fotografo->setEmailAlternativo($this->getRequest()->getPost('emailAlternativo'));
                $fotografo->setDireccion($this->getRequest()->getPost('direccion'));
                $fotografo->setTelefono($this->getRequest()->getPost('telefono'));
                $selectCiudad = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->find( $_POST['ciudad']);
                $fotografo->setCiudad($selectCiudad);
                $selectPlan = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->find( $_POST['plan']);
                $fotografo->setPlan($selectPlan);
                if (isset($_POST['activo'])){
                    $fotografo->setEstado(TRUE);
                }  else {
                    $fotografo->setEstado(FALSE);
                }
                $this->getObjectManager()->persist($fotografo);
                $this->getObjectManager()->flush();
            }
            
            // buscar $idFotog
            
//            for ($x = 1; $x < 10; $x++) {
//
//                $idAcerca = $x;
//                $habilitado = FALSE;
//                $datosAcerca = new \Micuenta\Model\DatosAcercaXFotografo();
//                
//                $datosAcerca->setIdFotografo($idFotog);
//                $datosAcerca->setIdAcerca($idAcerca);
//                $datosAcerca->setHabilitado($habilitado);
//                
//                $this->getObjectManager()->persist($datosAcerca);
//                $this->getObjectManager()->flush();
//                
//                }
                
            return $this->redirect()->toRoute('fotografo');
        }
                
            $planes = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->findAll();
            $paises = $this->getObjectManager()->getRepository('\Micuenta\Model\Pais')->findAll();
            $provincias = $this->getObjectManager()->getRepository('\Micuenta\Model\Provincia')->findAll();
            $ciudades = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->findAll();
            return new ViewModel(array('paises' => $paises, 'provincias' => $provincias, 'ciudades' => $ciudades, 'planes' => $planes));
    }
    
    
    
    public function editAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $fotografo = $this->getObjectManager()->find('\Micuenta\Model\Fotografo', $id);
        $id_plan_asociado = $fotografo->getPlan()->getId();
        $ciudad_asociada = $fotografo->getCiudad();
        $id_ciudad_asociada = $ciudad_asociada->getId();
        $provincia_asociada = $ciudad_asociada->getProvincia();
        $id_provincia_asociada = $provincia_asociada->getId();
        $id_pais_asociado = $provincia_asociada->getPais()->getId();

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $fotografo->setNombre($this->getRequest()->getPost('nombre'));
                $fotografo->setApellido($this->getRequest()->getPost('apellido'));
                $fotografo->setEmpresa($this->getRequest()->getPost('empresa'));
                $fotografo->setEmail($this->getRequest()->getPost('email'));
                $fotografo->setContrasenia($this->getRequest()->getPost('contrasenia'));
                $fotografo->setEmailAlternativo($this->getRequest()->getPost('emailAlternativo'));
                $fotografo->setDireccion($this->getRequest()->getPost('direccion'));
                $fotografo->setTelefono($this->getRequest()->getPost('telefono'));
                $selectCiudad = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->find( $_POST['ciudad']);
                $fotografo->setCiudad($selectCiudad);
                $selectPlan = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->find( $_POST['plan']);
                $fotografo->setPlan($selectPlan);
                if (isset($_POST['activo'])){
                    $fotografo->setEstado(TRUE);
                }  else {
                    $fotografo->setEstado(FALSE);
                }
                $this->getObjectManager()->persist($fotografo);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('fotografo');
        }
        $planes = $this->getObjectManager()->getRepository('\Micuenta\Model\Plan')->findAll();
        $paises = $this->getObjectManager()->getRepository('\Micuenta\Model\Pais')->findAll();
            $provincias = $this->getObjectManager()->getRepository('\Micuenta\Model\Provincia')->findAll();
            $ciudades = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->findAll();
        return new ViewModel(array('paises' => $paises, 'provincias' => $provincias, 'ciudades' => $ciudades,
            'fotografo' => $fotografo,'planes' => $planes,
            'id_plan_asociado' => $id_plan_asociado, 'id_ciudad_asociada' => $id_ciudad_asociada,
            'id_provincia_asociada' => $id_provincia_asociada, 'id_pais_asociado' => $id_pais_asociado));
    }
    
    
    
    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $fotografo = $this->getObjectManager()->find('\Micuenta\Model\Fotografo', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $del = $request->getPost('del', 'Cancelar');
            
            if ($del === 'Eliminar') {
                $this->getObjectManager()->remove($fotografo);
                $this->getObjectManager()->flush();
            }
            return $this->redirect()->toRoute('fotografo');
        }
        return new ViewModel(array('fotografo' => $fotografo));

    }
    
    
    public function datosAction()
    {
        
        $id = $this->params()->fromRoute('id', 0);
        $fotografo = $this->getObjectManager()->find('\Micuenta\Model\Fotografo', $id);
        $plan_asociado = $fotografo->getPlan();
        $ciudad_asociada = $fotografo->getCiudad();
        $id_ciudad_asociada = $ciudad_asociada->getId();
        $provincia_asociada = $ciudad_asociada->getProvincia();
        $id_provincia_asociada = $provincia_asociada->getId();
        $id_pais_asociado = $provincia_asociada->getPais()->getId();

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $fotografo->setNombre($this->getRequest()->getPost('nombre'));
                $fotografo->setApellido($this->getRequest()->getPost('apellido'));
                $fotografo->setEmail($this->getRequest()->getPost('email'));
                $fotografo->setEmpresa($this->getRequest()->getPost('empresa'));
                $fotografo->setContrasenia($this->getRequest()->getPost('contrasenia'));
                $fotografo->setEmailAlternativo($this->getRequest()->getPost('emailAlternativo'));
                $fotografo->setDireccion($this->getRequest()->getPost('direccion'));
                $fotografo->setTelefono($this->getRequest()->getPost('telefono'));
//                $selectCiudad = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->find( $_POST['ciudad']);
//                $fotografo->setCiudad($selectCiudad);
               
                $fotografo->setPlan($plan_asociado);
                
//                if (isset($_POST['activo'])){
//                    $fotografo->setEstado(TRUE);
//                }  else {
//                    $fotografo->setEstado(FALSE);
//                }
                $this->getObjectManager()->persist($fotografo);
                $this->getObjectManager()->flush();
            }
            
            $this->layout()->setTemplate('layout/fotografo');
            $this->layout()->setVariable('usuario1', $fotografo);
            
            return $this->redirect()->toRoute('fotografo', array('action'=>'datosguardados'),
                            array('query' => array('id' => $id),
                           ));
            
//            return $this->redirect()->toRoute('fotografo', array('action'=>'datosguardados', 'fotografo' => $fotografo));
        }
        
        $this->layout()->setTemplate('layout/fotografo');
        $this->layout()->setVariable('usuario1', $fotografo);
        $paises = $this->getObjectManager()->getRepository('\Micuenta\Model\Pais')->findAll();
            $provincias = $this->getObjectManager()->getRepository('\Micuenta\Model\Provincia')->findAll();
            $ciudades = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->findAll();
        return new ViewModel(array('paises' => $paises, 'provincias' => $provincias, 'ciudades' => $ciudades,
            'fotografo' => $fotografo, 'id_ciudad_asociada' => $id_ciudad_asociada, 
            'id_provincia_asociada' => $id_provincia_asociada, 'id_pais_asociado' => $id_pais_asociado));
        
    }
   

    public function datosguardadosAction()
    {
        
        $id = $this->params()->fromQuery('id',0);
        $fotografo = $this->getObjectManager()->find('\Micuenta\Model\Fotografo', $id);
        $this->layout()->setTemplate('layout/fotografo');
        $this->layout()->setVariable('usuario1', $fotografo);
        
        return new ViewModel(array('fotografo' => $fotografo));
    }
    
    
    public function acercaAction()
    {
        
        $id = $this->params()->fromRoute('id', 0);
        $fotografo = $this->getObjectManager()->find('\Micuenta\Model\Fotografo', $id);
        $plan_asociado = $fotografo->getPlan();
        $ciudad_asociada = $fotografo->getCiudad();
        $id_ciudad_asociada = $ciudad_asociada->getId();
        $provincia_asociada = $ciudad_asociada->getProvincia();
        $id_provincia_asociada = $provincia_asociada->getId();
        $id_pais_asociado = $provincia_asociada->getPais()->getId();

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                $this->layout()->setTemplate('layout/fotografo');
                $this->layout()->setVariable('usuario1', $fotografo);
            
                return $this->redirect()->toRoute('fotografo', array('action'=>'modifacerca'),
                            array('query' => array('id' => $id),
                           ));
            }

        }
        
        $this->layout()->setTemplate('layout/fotografo');
        $this->layout()->setVariable('usuario1', $fotografo);
        $paises = $this->getObjectManager()->getRepository('\Micuenta\Model\Pais')->findAll();
            $provincias = $this->getObjectManager()->getRepository('\Micuenta\Model\Provincia')->findAll();
            $ciudades = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->findAll();
        return new ViewModel(array('paises' => $paises, 'provincias' => $provincias, 'ciudades' => $ciudades,
            'fotografo' => $fotografo, 'id_ciudad_asociada' => $id_ciudad_asociada,
            'id_provincia_asociada' => $id_provincia_asociada, 'id_pais_asociado' => $id_pais_asociado));
        
    }
    
    
    
    public function modifacercaAction()
    {
        
        $id = $this->params()->fromQuery('id',0);
        $fotografo = $this->getObjectManager()->find('\Micuenta\Model\Fotografo', $id);
        $ciudad_asociada = $fotografo->getCiudad();
        $id_ciudad_asociada = $ciudad_asociada->getId();
        $provincia_asociada = $ciudad_asociada->getProvincia();
        $id_provincia_asociada = $provincia_asociada->getId();
        $id_pais_asociado = $provincia_asociada->getPais()->getId();
        
        $arraydatos = array();
        
        for ($x = 1; $x < 9; $x++) {
            
            $habilitado = FALSE;
            $datosAcerca = $this->getObjectManager()->find('\Micuenta\Model\DatosAcercaXFotografo',
                    array('id_fotografo' => $id, 'id_acerca' => $x));
            
            $arraydatos[$x] = $datosAcerca->getHabilitado();
        }

                
                


        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $editar = $request->getPost('editar', 'Cancelar');
            
            if ($editar === 'Modificar') {
                
                
                for ($x = 1; $x < 9; $x++) {

                $habilitado = FALSE;
                $datosAcerca = $this->getObjectManager()->find('\Micuenta\Model\DatosAcercaXFotografo',
                        array('id_fotografo' => $id, 'id_acerca' => $x));
                 
                switch ($x) {
                    case 1:
                        if (isset($_POST['empresa'])){ $habilitado = TRUE; };
                        break;
                        case 2:
                        if (isset($_POST['nombre'])){ $habilitado = TRUE; };
                        break;
                    case 3:
                        if (isset($_POST['direccion'])){ $habilitado = TRUE; };
                        break;
                    case 4:
                        if (isset($_POST['ciudad'])){ $habilitado = TRUE; };
                        break;
                    case 5:
                        if (isset($_POST['provincia'])){ $habilitado = TRUE; };
                        break;
                    case 6:
                        if (isset($_POST['pais'])){ $habilitado = TRUE; };
                        break;
                    case 7:
                        if (isset($_POST['email'])){ $habilitado = TRUE; };
                        break;
                    case 8:
                        if (isset($_POST['telefono'])){ $habilitado = TRUE; };
                        break;
                }
                $datosAcerca->setHabilitado($habilitado);
                
                $this->getObjectManager()->persist($datosAcerca);
                $this->getObjectManager()->flush();
                
                }
            }
            
            $this->layout()->setTemplate('layout/fotografo');
            $this->layout()->setVariable('usuario1', $fotografo);
            
            return $this->redirect()->toRoute('fotografo', array('action'=>'datosguardados'),
                            array('query' => array('id' => $id),
                           ));
            
//            return $this->redirect()->toRoute('fotografo', array('action'=>'datosguardados', 'fotografo' => $fotografo));
        }
        
        $this->layout()->setTemplate('layout/fotografo');
        $this->layout()->setVariable('usuario1', $fotografo);
        $paises = $this->getObjectManager()->getRepository('\Micuenta\Model\Pais')->findAll();
            $provincias = $this->getObjectManager()->getRepository('\Micuenta\Model\Provincia')->findAll();
            $ciudades = $this->getObjectManager()->getRepository('\Micuenta\Model\Ciudad')->findAll();
        return new ViewModel(array('paises' => $paises, 'provincias' => $provincias, 'ciudades' => $ciudades,
            'fotografo' => $fotografo, 'id_ciudad_asociada' => $id_ciudad_asociada,
            'id_provincia_asociada' => $id_provincia_asociada, 'id_pais_asociado' => $id_pais_asociado,
             'arraydatos' => $arraydatos));
        
    }
    
    
    
}