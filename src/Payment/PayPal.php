<?php

namespace Swedbank\Banklink\Payment;

/**
 * This class describes data to be used for PayPal payments
 *
 * This file is part of the Swedbank/BankLink package.
 *
 * (c) Deniss Kozlovs <deniss@codeart.lv>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
class PayPal implements Method
{

	/**
	 * @inheritDoc
	 */
	public function getCodeName()
	{
		return 'PP';
	}
}