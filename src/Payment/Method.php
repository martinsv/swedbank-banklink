<?php

namespace Swedbank\Banklink\Payment;

/**
 * Interface for payment method
 *
 * This file is part of the Swedbank/BankLink package.
 *
 * (c) Deniss Kozlovs <deniss@codeart.lv>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
interface Method
{

	/**
	 * Get payment method short code
	 *
	 * @return string
	 */
	public function getCodeName();
}