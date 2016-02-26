<?php

namespace Swedbank\Banklink\Payment;

/**
 * This class describes credit card payment related data.
 *
 * This file is part of the Swedbank/BankLink package.
 *
 * (c) Deniss Kozlovs <deniss@codeart.lv>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
class CreditCard implements Method
{

	/**
	 * @inheritDoc
	 */
	public function getCodeName()
	{
		return 'CC';
	}
}