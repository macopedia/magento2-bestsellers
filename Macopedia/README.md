# Macopedia Bestseller Magento 2 module

Module for Magento 2 responsible for automatically assign products with bestseller attribute to bestseller category.

## Requirements

PHP >= 8.1
Magento Open Source version >= 2.4.4

## Main features

1. Automatically add product with `Bestseller` attribute set on `Yes` to bestsellers category after product save
2. Automatically remove product with `Bestseller` attribute set on `No` from bestsellers category after product save
3. Automatically synchronize product with `Bestseller` attribute to bestsellers category in cronjob every day at 5:00 AM

## Installation

1. Using composer:

```
composer require macopedia/magento2-bestsellers
```

2. Using zip file:
    1. Download zip file
    2. Extract module in directory `app/code/Macopedia/Bestsellers`

Enable module and install patches:
```
   bin/magento module:enable Macopedia_Bestsellers
   bin/magento setup:upgrade
```

## Configuration

1. If you don't have category created - create `Bestseller` category in your Magento 2 instance
2. Go to `Stores > Configuration > Macopedia > Bestseller`
3. In group `General` choose `Enabled` to `Yes` to activate module
4. In group `Mappings` select `Bestseller Attribute` - this attribute is created automatically and has name `Bestseller`
5. In group `Mappings` select `Bestseller Category` - category which you decided to use as category for bestsellers
6. Save configuration
7. Clean configuration cache

## Usage

1. Go to product edit and open group `Product Details`
2. Change `Bestseller` attribute value to `Yes`
3. Save product

## Contributors

@idziakjakub
@msloboda-macopedia

## License

[Open Source License](LICENSE.txt)
