<?php

class Deposits implements ITotal
{
	/**
	 * @var array $deposits
	 */
	protected $deposits = [];

	/**
	 * @param Deposit $deposit
	 * @return $this
	 */
	public function addDeposit(Deposit $deposit)
	{
		$this->deposits[] = $deposit;

		return $this;
	}

	/**
	 * @return double
	 */
	public function getTotal()
	{
		$total = 0;

		foreach ($this->deposits as $deposit) {
			$total += $deposit->getDeposit();
		}

		return $total;
	}
}
