# Orchard Background Menu

The **Orchard Background Menu** module enhances the Drupal main navigation by allowing you to set background images for menu items. It utilizes the **menu_item_extras** module to add an image field to menu items and queries the parent element of a menu item to set the background dynamically. This module calls a template to render the background and handles switching between backgrounds based on the selected item.

## Features

- Enhances the **Main navigation** menu by adding background images to menu items.
- Uses the **menu_item_extras** module to add an image field to menu items.
- Queries a parent menu element for reference to set the background.
- Uses a custom template to display the background image dynamically.
- Switches between backgrounds when changing between menu items.

## Requirements

- Drupal 11.
- **menu_item_extras** module must be enabled.

## Installation

1. Download the **Orchard Background Menu** module and place it in the `/modules/custom` directory of your Drupal installation.
2. Enable the module via the Drupal admin interface or use Drush with the following command: ´drush en orchard_background_menu´


3. Ensure the **menu_item_extras** module is enabled, as this module relies on it for adding the image field to menu items.

## Configuration

### 1. Enable the Image Field for Menu Items
After installing the module, the **menu_item_extras** module will add an image field to the menu items in the **Main navigation** menu. You can configure this field for each menu item.

### 2. Assign a Parent Menu Item
The module queries the parent menu element of the menu items to set the background dynamically. Make sure that you assign the correct parent item for each menu to ensure the background image is applied correctly.

### 3. Add Background Images
For each menu item that you want to display a background for, go to the **Menu structure** and select a menu item. You will find the option to upload an image in the field added by **menu_item_extras**.

### 4. Template for Background Rendering
The module uses a custom template to render the background image. You can customize this template by overriding it in your theme for more control over the output.

## Documentation

### menu_item_extras Module

This module relies on **menu_item_extras** to add custom fields, like the image field, to menu items. If you're not familiar with the **menu_item_extras** module, here is the official documentation:

- [menu_item_extras module documentation](https://www.drupal.org/project/menu_item_extras)

### Customizing the Template

The background image is rendered using a custom template. If you want to change how the background is displayed, you can override the template in your theme. Here is the documentation on how to customize templates in Drupal:

- [Drupal Theme Templates](https://www.drupal.org/docs/theming-drupal)

## License

This module is licensed under the **MIT License**.

### Author

Brandon Cortes

