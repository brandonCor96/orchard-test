<?php

namespace Drupal\orchard_product\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the UniqueInteger constraint.
 */
class PODLimitConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($value, Constraint $constraint) {
    foreach ($value as $item) {
      $orchard_service = \Drupal::service('orchard_product.orchard_product_service')->getProductsWithPodEnabled();
      if ($item->value == 1 && is_array($orchard_service) && count($orchard_service) >= 5) {
        $this->context->addViolation($constraint->greaterThan, []);
      }
    }
  }
}