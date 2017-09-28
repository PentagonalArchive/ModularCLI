#!/usr/bin/env php
<?php
/**
 * Composer CLI Application Worker
 * This file must be execute with composer run-script
 */
if (php_sapi_name() !== 'cli') {
    echo "Script must be run via CLI mode.";
    exit(1);
}
