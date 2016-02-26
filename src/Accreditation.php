<?php

namespace Swedbank\Banklink;

use Swedbank\Banklink\Gateway;
use Swedbank\Banklink\Exception\AccreditationException;

/**
 * Holds access credentials to payment gateway.
 *
 * This file is part of the Swedbank/BankLink package.
 *
 * (c) Deniss Kozlovs <deniss@codeart.lv>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
class Accreditation
{
	/**
	 * Credentials
	 *
	 * @var array
	 */
	protected $credentials = [];

	/**
	 * Sets development credentials
	 *
	 * @param string $vTID vTID
	 * @param string $password Password
	 */
	public function setDev($vTID, $password, $responseUrl)
	{
		$this -> setCredentials(Gateway::ENV_DEV, $vTID, $password, $responseUrl);
	}

	/**
	 * Sets production credentials
	 *
	 * @param string $vTID vTID
	 * @param string $password Password
	 */
	public function setProd($vTID, $password, $responseUrl)
	{
		$this -> setCredentials(Gateway::ENV_PROD, $vTID, $password, $responseUrl);
	}

	/**
	 * Internal method for saving credentials
	 *
	 * @param string $mode
	 * @param string $vTID
	 * @param string $password
	 * @throws AccreditationException
	 */
	private function setCredentials($mode, $vTID, $password, $responseUrl)
	{
		$uri = parse_url($responseUrl);
		$uri += [
			'scheme' => '',
			'host' => '',
		];

		if (!$uri['scheme'] || !$uri['host']) {
			throw new AccreditationException(sprintf('Response url for %s: Please provide fully-qualified URL', $mode));
		}

		if (!$vTID || !$password) {
			throw new AccreditationException(sprintf('Credentials for %s: both username and password must be set.', $mode));
		}

		$this -> credentials[$mode] = [
			'client' => $vTID,
			'password' => $password,
			'responseUrl' => $responseUrl
		];
	}

	/**
	 * Returns credentials for requested environment
	 *
	 * @param string $mode Environment
	 * @return array Credentials
	 */
	public function getCredentials($mode)
	{
		return isset($this -> credentials[$mode]) ? $this -> credentials[$mode] : false;
	}
}