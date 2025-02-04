# Orchard Product

The **orchard_product** module provides a custom entity type called `orchard_product`, which can be managed just like any other entity in Drupal, but with custom features tailored to your needs. This module includes a service that allows you to track how many entities are marked as the **Product of the Day**, enforcing a constraint to prevent the creation of more than five products marked as such.

## Features

- Provides a custom entity type called `orchard_product`.
- Allows managing the **Product of the Day** through a custom field.
- Includes a service to track how many **Product of the Day** entities exist.
- Enforces a constraint to limit the number of **Product of the Day** entities to five.

## Requirements

- Drupal 11.

## Installation

1. Download the **orchard_product** module and place it in the `/modules/custom` directory of your Drupal installation.
2. Enable the module via the Drupal admin interface or use Drush with the following command: ´lando drush en orchard_product´


This will automatically register the custom entity type and associated services.

## Configuration

Once the module is installed, the custom entity type `orchard_product` will be available. You can create and manage entities of this type like any other entity in Drupal:

1. Go to **Structure > Content types** (or **Manage > Content types**).
2. Add or configure the **Orchard Product** entity type.
3. You can mark an entity as the **Product of the Day** using the custom field.

### Product of the Day Limit

To ensure that there are no more than five products marked as the **Product of the Day**, the module will enforce a constraint when you try to create a new product. If you already have five products marked as the **Product of the Day**, you will be prevented from creating a new one.

This feature is managed via a service that tracks the number of active **Product of the Day** entities and applies the constraint when needed.

## Documentation

### Creating Custom Entities in Drupal

The **orchard_product** module adds a custom entity type, and you can manage it like any other entity in Drupal. Here’s some documentation on how custom entities work in Drupal:

- [Drupal Entity API](https://www.drupal.org/docs/8/api/entity-api)
- [Creating Custom Entities in Drupal](https://www.drupal.org/docs/8/creating-custom-entities)

### Service for Product of the Day Limit

This module uses a service to keep track of how many **Product of the Day** entities are active. It ensures that no more than five such entities exist by applying a constraint when trying to create new products. For more details on how services work in Drupal, check the following:

- [Drupal Service Container](https://www.drupal.org/docs/8/api/service-container)
- [Creating Custom Services in Drupal](https://www.drupal.org/docs/8/creating-custom-services)

## License

This module is licensed under the **MIT License**.

### Author

Brandon Cortes
