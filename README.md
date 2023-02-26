# CLUB1 French Typography

![License](https://img.shields.io/badge/license-AGPL--3.0--or--later-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/club-1/flarum-ext-french-typography.svg)](https://packagist.org/packages/club-1/flarum-ext-french-typography) [![Total Downloads](https://img.shields.io/packagist/dt/club-1/flarum-ext-french-typography.svg)](https://packagist.org/packages/club-1/flarum-ext-french-typography)

A _very_ simple [Flarum](http://flarum.org) extension. Enhanced typography for french writings, mainly around punctuation.

## Features

- Convert spaces before a double punctuation mark (`?`, `!`, `:`, `;`) to a non-breaking space (`&nbsp;`).
- Enable a custom version of TextFormatter's [FancyPants plugin] with the following differences:
  - Double quotes are replaced with « guillemets », separated from the text by non-breaking spaces.

[FancyPants plugin]: https://s9etextformatter.readthedocs.io/Plugins/FancyPants/Synopsis/

## Installation

Install with composer:

```sh
composer require club-1/flarum-ext-french-typography
```

## Updating

```sh
composer update club-1/flarum-ext-french-typography
php flarum cache:clear
```

## Links

- [Packagist](https://packagist.org/packages/club-1/flarum-ext-french-typography)
- [GitHub](https://github.com/club-1/flarum-ext-french-typography)
- [Discuss](https://discuss.flarum.org/d/32449-french-typography)
