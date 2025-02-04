<?php

namespace Drupal\orchard_product\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the sum of Entities with the Product of the dat bool TRUE is not greater than 5.
 *
 * @Constraint(
 *   id = "PODLimitValidation",
 *   label = @Translation("Product of the Day", context = "Validation"),
 *   type = "string"
 * )
 */
class PODLimitConstraint extends Constraint {

  // The message that will be shown if the value is greater than 5.
  public $greaterThan = 'You have exceeded the limit of (5) Products of the Day.';
}