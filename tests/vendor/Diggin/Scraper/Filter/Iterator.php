<?php

/**
 * Diggin - Simplicity PHP Library
 * 
 * LICENSE
 *
 * This source file is subject to the new BSD license.
 * It is also available through the world-wide-web at this URL:
 * http://diggin.musicrider.com/LICENSE
 * 
 * @category   Diggin
 * @package    Diggin_Scraper
 * @copyright  2006-2010 sasezaki (http://diggin.musicrider.com)
 * @license    http://diggin.musicrider.com/LICENSE     New BSD License
 */

require_once 'Diggin/Scraper/Filter.php';

class Diggin_Scraper_Filter_Iterator extends IteratorIterator
{
    /**
     * constructor
     *
     * @param Diggin_Scraper_Evaluator_Abstract $callback
     */
    public function __construct(Diggin_Scraper_Evaluator_Abstract $callback)
    {
        if ($filters = $callback->getProcess()->getFilters()) {
            $callback = $this->_apply($callback, $filters);
        }

        return parent::__construct($callback);
    }
    
    /**
     * Apply Filter
     *
     * @param Iterator $iterator
     * @param mixed $filters
     * @return Iterator
     */
    protected function _apply($iterator, $filters)
    {
        foreach ($filters as $filter) {
            $iterator = Diggin_Scraper_Filter::factory($iterator, $filter);
        }

        return $iterator;
    }

}
