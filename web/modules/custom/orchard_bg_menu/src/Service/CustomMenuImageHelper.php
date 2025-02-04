<?php

namespace Drupal\orchard_bg_menu\Services;

use Drupal\Core\Menu\MenuLinkInterface;
use Drupal\Core\Menu\MenuLinkManagerInterface;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Helper class for processing menu images.
 */
class CustomMenuImageHelper {

  /**
   * The menu link manager service.
   *
   * @var \Drupal\Core\Menu\MenuLinkManagerInterface
   */
  protected $menuLinkManager;

  /**
   * The current route match service.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Constructs a CustomMenuImageHelper object.
   *
   * @param \Drupal\Core\Menu\MenuLinkManagerInterface $menu_link_manager
   *   The menu link manager.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The current route match.
   */
  public function __construct(MenuLinkManagerInterface $menu_link_manager, RouteMatchInterface $route_match) {
    $this->menuLinkManager = $menu_link_manager;
    $this->routeMatch = $route_match;
  }


  public function getCustomImageBlock() {
    if ($node = $this->routeMatch->getParameter('node')) {
      if ($node instanceof \Drupal\node\NodeInterface) {
        $node_id = $node->id();
        $menu_links = $this->menuLinkManager->loadLinksByRoute('entity.node.canonical', ['node' => $node_id]);

        if (!empty($menu_links)) {
          $menu_link = reset($menu_links);

          if ($menu_link instanceof MenuLinkInterface) {
            $parent_id = $menu_link->getParent();

            if (!empty($parent_id)) {
              $parent_menu_link = $this->menuLinkManager->createInstance($parent_id);

              if ($parent_menu_link instanceof MenuLinkInterface) {
                $menu_entity = $parent_menu_link->getEntity();
                $field_value = $menu_entity->get('field_custom_image')->entity->uri->value;

                return [
                  '#theme' => 'custom_image_block',
                  '#custom_image_uri' => $field_value,
                ];
              }
            }
          }
        }
      }
    }

    return NULL;
  }
}
