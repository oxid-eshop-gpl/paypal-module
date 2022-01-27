<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Core\Exception;

use Exception;

class NotFound extends Exception
{
    protected const NOT_FOUND_MESSAGE = 'Queried data was not found';

    public static function notFound(): self
    {
        return new self(self::NOT_FOUND_MESSAGE);
    }
}
