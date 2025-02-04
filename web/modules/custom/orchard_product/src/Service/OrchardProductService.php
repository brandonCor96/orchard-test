<?php

namespace Drupal\orchard_product\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Service to retrieve OrchardEntityProduct entities.
 */
class OrchardProductService {

  protected $entityTypeManager;

  /**
   * Constructor.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * Gets all orchard_entity_product entities where pod = 1.
   */
  public function getProductsWithPodEnabled() {
    $storage = $this->entityTypeManager->getStorage('orchard_entity_product');

    // Query entities where 'pod' field is TRUE (1).
    $query = $storage->getQuery()
      ->condition('pod', 1)
      ->accessCheck(FALSE)
      ->execute();

    // Load and return the full entity objects.
    //return $storage->loadMultiple($query);
    return $query;
  }

}
