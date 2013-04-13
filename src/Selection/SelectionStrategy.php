<?php

namespace Rickard\UTCW\Selection;

/**
 * Ultimate Tag Cloud Widget
 *
 * @author     Rickard Andersson <rickard@0x539.se>
 * @version    2.2
 * @license    GPLv2
 * @package    utcw
 * @subpackage selection
 * @since      2.2
 */

use Rickard\UTCW\Config;
use Rickard\UTCW\Plugin;
use \stdClass;
use wpdb;

/**
 * Abstract class to define selection strategy for finding terms
 *
 * @since      2.2
 * @package    utcw
 * @subpackage language
 */
abstract class SelectionStrategy
{
    /**
     * Creates a new instance
     *
     * @param Config $config   Current configuration
     * @param Plugin $plugin   Main plugin instance
     * @param wpdb   $db       WordPress DB instance
     *
     * @since 2.0
     */
    abstract public function __construct(Config $config, Plugin $plugin, wpdb $db);

    /**
     * Loads terms based on current configuration
     *
     * @return stdClass[]
     * @since 2.0
     */
    abstract public function getData();

    /**
     * @return void
     */
    abstract public function cleanupForDebug();
}