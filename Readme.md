# UrlRemoveAccent

[DEPRECATED] If you have Thelia >= 2.4.0 it's recommended to use :
https://github.com/thelia-modules/UrlSanitizer

This module allows you to strip all accents in your urls.

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is UrlRemoveAccent.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require thelia/url-remove-accent-module:~1.0
```

## Usage

- If the module is activated, every new rewritten url generated (eg. on a product or category creation) will be automatically parsed and the accents will be removed.
- If you want to remove accents in the existing urls in your database, go to the module configuration and follow the instructions.
