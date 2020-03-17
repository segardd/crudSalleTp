<?php
namespace App\Event;
use Symfony\Contracts\EventDispatcher\Event;
class ModificationEvent extends Event {
 protected $modification;
 public function __construct($descriptif) {
 $this->modification = $descriptif;
 }
 public function getModification() {
 return $this->modification;
 }
}