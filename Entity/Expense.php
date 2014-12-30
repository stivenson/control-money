<?php

class Expense
{	
	use EntityAware;

	/**
	 * @var double $expense
	 */
	protected $expense;

	/**
	 * @return double 
	 */
	public function getExpense()
	{
		return $this->expense;
	}

	/**
	 * @param double $expense
	 * @return $this
	 */
	public function setExpense($expense)
	{
		$this->expense = $expense;

		return $this;
	}
}
