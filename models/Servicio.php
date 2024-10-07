<?php
  	
namespace Model;
use Model\ActiveRecord;

class Servicio extends ActiveRecord {

  //Base de datos
  protected static $tabla = "servicios";
  protected static $columnasDB = ["id", "nombre", "precio"];

  public $id;
  public $nombre;
  public $precio;

  public function __construct($args = []) {
    $this->id = $args["id"] ?? null;
    $this->nombre = $args["nombre"] ?? "";
    $this->precio = $args["precio"] ?? "";
  }

  public function validar() {
    if (!$this->nombre) {
      self::$alertas["error"][] = "Debes poner el nombre del servicio";
    }

    if (!$this->precio) {
      self::$alertas["error"][] = "Debes poner el precio del servicio";
    }

    if (!is_numeric($this->precio)) {
      self::$alertas["error"][] = "Formato de precio inválido";
    }

    return self::$alertas;
  }

}