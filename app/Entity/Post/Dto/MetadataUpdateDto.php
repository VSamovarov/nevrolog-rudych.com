<?php

namespace App\Entity\Post\Dto;

class MetadataUpdateDto
{
  private $_title;
  private $_name;
  private $_value;
  private $order;

  public function __construct(string $_name, string $_title, array $_value, int $order)
  {
    $this->_title = $_title;
    $this->_name = $_name;
    $this->_value = $_value;
    $this->order = $order;
  }
  public function getOrder()
  {
    return $this->order;
  }
  public function get_value()
  {
    return $this->_value;
  }

  public function get_name()
  {
    return $this->_name;
  }
  public function get_title()
  {
    return $this->_title;
  }
}
