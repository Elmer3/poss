<?php
	require_once('include/SuperClass.php');
	class guia_movimiento extends SuperClass{
		private $inputvars = array();
		private $inputname = 'guia_movimiento';
        function __construct($id=NULL,$id_movimiento_producto=NULL,$id_guia_producto=NULL,$estado_fila=NULL)
		{
        $this->inputvars["id"] = $id;
		  $this->inputvars["id_movimiento_producto"] = $id_movimiento_producto;
		  $this->inputvars["id_guia_producto"] = $id_guia_producto;
		  $this->inputvars["estado_fila"] = $estado_fila;
		  
			parent::__construct($this->inputvars,$this->inputname);
		}
	
          public function setId($newval){
              parent::setVar("id",$newval);
          }
          
          public function getId(){
              return parent::getVar("id");
          }
          public function setIdMovimientoProducto($newval){
              parent::setVar("id_movimiento_producto",$newval);
          }
          
          public function getIdMovimientoProducto(){
              return parent::getVar("id_movimiento_producto");
          }
          public function setIdGuiaProducto($newval){
              parent::setVar("id_guia_producto",$newval);
          }
          
          public function getIdGuiaProducto(){
              return parent::getVar("id_guia_producto");
          }

          public function setEstadoFila($newval){
              parent::setVar("estado_fila",$newval);
          }
          
          public function getEstadoFila(){
              return parent::getVar("estado_fila");
          }
        }?>