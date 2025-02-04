<?php

namespace Drupal\orchard_product;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a Product entity.
 *
 * We have this interface so we can join the other interfaces it extends.
 *
 * @ingroup orchard_product
 */
interface ProductInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
