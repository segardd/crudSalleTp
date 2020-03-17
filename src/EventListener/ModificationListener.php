<?php
namespace App\EventListener;
use App\Entity\Historique;
use App\Event\ModificationEvent;
use \Doctrine\ORM\EntityManager;
class ModificationListener {
 protected $entityManager;
 public function __construct(EntityManager $entityManager) {
 $this->entityManager = $entityManager; 
 }
 public function onModif(ModificationEvent $event) {
 $historique = new Historique();
 $historique->setOperation($event->getModification());
 $historique->setdate(new \DateTime('now'));
 $this->entityManager->persist($historique);
 $this->entityManager->flush();
 }
}
