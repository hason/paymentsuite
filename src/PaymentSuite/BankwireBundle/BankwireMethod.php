<?php

/*
 * This file is part of the PaymentSuite package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

namespace PaymentSuite\BankwireBundle;

use PaymentSuite\PaymentCoreBundle\PaymentMethodInterface;

/**
 * BankwireMethod class
 */
class BankwireMethod implements PaymentMethodInterface
{
    /**
     * Method name
     */
    const METHOD_NAME = 'Bankwire';

    /**
     * Get Bankwire method name
     *
     * @return string Payment name
     */
    public function getPaymentName()
    {
        return self::METHOD_NAME;
    }
}
