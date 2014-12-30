<?php

class MoneyControl
{
	/**
	 * @param array $movements
	 * @return double
	 */
	public function getBalance(array $movements = array())
	{
		$balance = 0;

		foreach ($movements as $movement) {
			if ($movement instanceof ITotal) {
				$balance += $movement->getTotal();
			}
		}

		return $balance;
	}
}