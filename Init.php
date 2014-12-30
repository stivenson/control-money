<?php
// yes I know, should be used composer

require 'Entity/EntityAware.php';
require 'Entity/Expense.php';
require 'Entity/Deposit.php';
require 'Service/ITotal.php';
require 'Service/Expenses.php';
require 'Service/Deposits.php';
require 'Service/MoneyControl.php';

class Init
{
	/**
	 * @var MoneyControl
	 */
	protected $moneyControl;

	/**
	 * @var Expenses
	 */
	protected $expenses;

	/**
	 * @var Deposits
	 */
	protected $deposits;

	/**
	 * @var array
	 */
	protected $movements;

	/**
	 * @var array
	 */
	protected $menuOptions = array(
		1 => 'Añadir Gastos',
		2 => 'Añadir Dinero',
		3 => 'Consultar Saldo',
		4 => 'Salir',
	);

	public function __construct()
	{
		$this->moneyControl = new MoneyControl();
		$this->expenses     = new Expenses();
		$this->deposits     = new Deposits();

		$this->movements = array(
			$this->expenses,
			$this->deposits,
		);
	}

	public function start()
	{
		$option = 1;

		do {
			switch ($this->chooseOption()) {
				case 1:
					$this->addExpenses();
					break;

				case 2:
					$this->addDeposits();
					break;

				case 3:
					$this->checkBalance();
					break;

				case 4:
					$option = 4;
					exit;
			}
		} while($option != 4);
	}

	/**
	 * @return void
	 */
	public function addExpenses()
	{
		echo 'Añadir Gastos' . PHP_EOL;

		$name    = $this->input('Nombre del Gasto: ');
		$ammount = $this->input('Monto del Gasto: ');
		$expense = new Expense();

		$expense
			->setName($name)
			->setExpense($ammount)
		;

		$this->expenses->addExpense($expense);
	}

	/**
	 * @return void
	 */
	public function addDeposits()
	{
		echo 'Añadir Saldo' . PHP_EOL;

		$name    = $this->input('Nombre del Deposito: ');
		$ammount = $this->input('Monto del Deposito: '); 
		$deposit = new Deposit();

		$deposit
			->setName($name)
			->setDeposit($ammount)
		;

		$this->deposits->addDeposit($deposit);
	}

	/**
	 * @return void
	 */
	public function checkBalance()
	{
		echo PHP_EOL . 'Tu saldo es de: ';
		echo $this->moneyControl->getBalance($this->movements) . PHP_EOL;
		echo PHP_EOL;
	}

	/**
	 * @param string $message
	 * @return string
	 */
	protected function input($message)
	{
		$return = '';

		do {
			echo $message . PHP_EOL;

			$handle = fopen ('php://stdin', 'r');
			$return = fgets($handle);
		
		} while(strlen(trim($return)) == 0);
	
		fclose($handle);

		return $return;
	}

	/**
	 * @return void
	 */
	protected function printMenu()
	{
		echo 'MENU - CONTROL DE GASTOS' . PHP_EOL;

		foreach ($this->menuOptions as $i => $menu) {
			echo sprintf('%d.- %s' . PHP_EOL, $i, $menu);
		}
	}

	/**
	 * @return int
	 */
	protected function chooseOption()
	{
		$this->printMenu();

		$option = 0;

		do {
			echo 'Escoge una opcion: ' . PHP_EOL;

			$handle = fopen ('php://stdin', 'r');
			$option = fgets($handle);
		
		} while(!$this->isValidOption($option));

		fclose($handle);
	
		return $option;
	}

	/**
	 * @param string $option
	 * @return bool
	 */
	protected function isValidOption($option)
	{
		return in_array($option, array_keys($this->menuOptions));
	}
	
}