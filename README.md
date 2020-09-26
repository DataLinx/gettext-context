# gettext-context
Implementation of context functions for the PHP gettext extension

![Packagist Version](https://img.shields.io/packagist/v/datalinx/gettext-context)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/datalinx/gettext-context)
![Coverage 100%](assets/coverage.svg)
![Packagist License](https://img.shields.io/packagist/l/datalinx/gettext-context)
![Packagist Downloads](https://img.shields.io/packagist/dt/datalinx/gettext-context)

## About
PHP still lacks full support for gettext, because it does not implement the context functions.
Until this is sorted out, you can use this package to add context support to your localization efforts.

## Requirements
- PHP >= 7.2
- gettext PHP extension

It can be used on lower versions of PHP, but you won't be able to install it with composer (or run tests).

## Installing
1. Download it with composer: `composer require datalinx/gettext-context` 
2. Include the `vendor/datalinx/gettext-context/src/gettext-context.php` file when you need it*

\* It's not added to the `autoload` directive, since you might not need or want to always include it in runtime. If you want to always load it, just add the source file to your `composer.json` autoload files list:

```json
{
    "autoload": {
        "files": [
            "vendor/datalinx/gettext-context/src/gettext-context.php"
        ]
    }
}
```

## Usage
See the documented [src/gettext-context.php](src/gettext-context.php) file for the list of functions and their parameters.

## Extracting messages with context support

### With xgettext
You can add extra keyword parameters to your `xgettext` call to include the context functions.
For example, this would be used in our package:

```shell
xgettext --force-po --keyword=pgettext:1c,2 --keyword=npgettext:1c,2,3 --keyword=dpgettext:2c,3 --keyword=dnpgettext:2c,3,4 -c -o messages.po tests/Test.php
```

### With Poedit
If you're using Poedit, add the following keywords in your Catalog > Properties > Sources Keywords:

- `pgettext:1c,2`
- `npgettext:1c,2,3`
- `dpgettext:2c,3`
- `dnpgettext:2c,3,4`

Then run the "Update from code" procedure :)

## Credits
- [This answer](https://stackoverflow.com/questions/16260798/gettext-how-to-handle-homonyms/16263617#16263617) on Stack Overflow for the implementation.
- [This comment](https://www.php.net/manual/en/book.gettext.php#89975) on the PHP documentation for the messages extraction fix.
