<?php

class Deposit
{
	use EntityAware;

	/**
	 * @var double $deposit
	 */
	protected $deposit;

	/**
	 * @return double
	 */
	public function getDeposit()
	{
		return $this->deposit;
	}

	/**
	 * @param double $deposit
	 * @return $this
	 */
	public function setDeposit($deposit)
	{
		$this->deposit = $deposit;

		return $this; 
	}
}
