Diggin_Scraper_Adapter_Htmlscraping
===================================

Master: [![Build Status](https://travis-ci.org/diggin/Diggin_Scraper_Adapter_Htmlscraping.png?branch=master)](https://travis-ci.org/diggin/Diggin_Scraper_Adapter_Htmlscraping)
[![Coverage Status](https://coveralls.io/repos/diggin/Diggin_Scraper_Adapter_Htmlscraping/badge.png?branch=master)](https://coveralls.io/r/diggin/Diggin_Scraper_Adapter_Htmlscraping?branch=master)

- This package aims to used by Diggin_Scraper.
- But, this component is useful as standalone.

### USAGE

``` php
<?php
use Diggin\Scraper\Adapter\Htmlscraping\Htmlscraping;

$htmlscraping = new Htmlscraping;
$htmlscraping->getXhtml((new Zend\Http\Client)->setUri($url)->send());

```
