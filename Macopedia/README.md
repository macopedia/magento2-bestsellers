# Macopedia Bestseller

Module for Magento2 for mapping bestseller attribute on bestseller category.

## Requirements
Magento Open Source version > 2.4.x
RabbitMQ

## Installation

Using zip file:
    Download zip file
    Extract module in directory app/code/Macopedia/GusIntegration

Enable module and install patches:
```
bin/magento module:enable Macopedia_Bestseller
bin/magento setup:upgrade
```

## Configuration
1. Go to **Stores > Configuration > Macopedia > Bestseller**
2. In group **Mappings** select **Bestseller Attribute** and select **Bestseller Catgegory**
3. In group **General** choose **Enabled** for activate/deactivate module
4. Save Config
5. Clean Cache

## Usage
1. Go to **Catalog > Products > select product**
2. Select **Add Attribute** button
3. Add bestseller attribute
4. Go to **Attributes section**
5. **Enable Bestseller** Attribute (choose YES)
6. **Save** product
7. Bestseller Category will be assigned to product automatically. 
   Rabbit queues may delay proces, so please refresh site.

## Screenshots

## Contributors

Macopedia Magento team

## License

[Open Source License](LICENSE.txt)

