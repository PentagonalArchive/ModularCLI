<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Source\Interfaces;

/**
 * Interface ModularInterface
 * @package Pentagonal\ModularCLI\Source\Interfaces
 */
interface ModularInterface
{
    const SELECTOR    = 'modular_selector';
    const NAME        = 'name';
    const VERSION     = 'version';
    const AUTHOR      = 'author';
    const AUTHOR_URI  = 'author_uri';
    const URI         = 'uri';
    const DESCRIPTION = 'description';
    const CLASS_NAME  = 'class_name';
    const FILE_PATH   = 'file_path';

    /**
     * Get Module Selector Name
     *
     * @return string
     */
    public function getModularNameSelector() : string;

    /**
     * Get Modular Info
     *
     * @return array
     */
    public function getModularInfo() : array;

    /**
     * Get Modular Name
     *
     * @return string
     */
    public function getModularName() : string;

    /**
     * Get Modular Version commonly string|integer|float
     *
     * @return string
     */
    public function getModularVersion() : string;

    /**
     * Get Modular Author
     *
     * @return string
     */
    public function getModularAuthor() : string;

    /**
     * Get Modular Author
     *
     * @return string
     */
    public function getModularAuthorUri() : string;

    /**
     * Get Modular URL
     *
     * @return string
     */
    public function getModularUri() : string;

    /**
     * Get Description of Modular
     *
     * @return string
     */
    public function getModularDescription() : string;

    /**
     * Initialize Modular
     *
     * @return mixed
     */
    public function init();
}
