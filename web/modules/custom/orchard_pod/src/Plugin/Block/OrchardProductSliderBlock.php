<?php

namespace Drupal\orchard_pod\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\Markup;

/**
 * Provides a 'Orchard POD Slider' Block.
 *
 * @Block(
 *   id = "orchard_product_slider_block",
 *   admin_label = @Translation("Orchard Product of the Day Slider"),
 * )
 */
class OrchardProductSliderBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new OrchardProductSliderBlock instance.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $storage = $this->entityTypeManager->getStorage('orchard_entity_product');
    $query = $storage->getQuery()
      ->condition('pod', 1)
      ->accessCheck(TRUE)
      ->execute();

    $products = $storage->loadMultiple($query);

    $items = [];
    $default_image = '/modules/custom/orchard_pod/images/default.jpg';

    foreach ($products as $product) {
      $image = $default_image;
      if ($product->hasField('field_image') && !$product->get('field_image')->isEmpty()) {
        $image_file = $product->get('field_image')->entity;
        if ($image_file) {
          $image = file_create_url($image_file->getFileUri());
        }
      }

      $items[] = [
        'image' => $image,
        'name' => $product->label(),
      ];
    }

    return [
      '#theme' => 'orchard_product_slider',
      '#items' => $items,
    ];
  }
}
