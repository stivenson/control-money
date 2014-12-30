<?php

class Expenses implements ITotal
{
	/**
	 * @var array $expenses
	 */
	protected $expenses = [];

	/**
	 * @param Expense $expense 
	 * @return $this
	 */
	public function addExpense(Expense $expense)
	{
		$this->expenses[] = $expense;

		return $this;
	}

	/**
	 * @return double
	 */
	public function getTotal()
	{
		$total = 0;

		foreach ($this->expenses as $expense) {
			$total += $expense->getExpense();
		}

		return (-$total);
	}
}
