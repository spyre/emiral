<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		class ExceptionFonduriInsuficiente extends Exception{

		}

		class ExceptionSumaNegativa extends Exception{

		}

		class Account{

			private $balance;

			public function __construct($balance){
				$this->balance = $balance;
			}

			public function setBalance($balance){
				$this->balance = $balance;
			}

			public function getBalance(){
				return $this->balance;
			}

			public function depositAmount($amount){
				$this->balance += $amount;
			}

			public function withdraw($amount){
				if($this->balance < $amount)
					throw new ExceptionFonduriInsuficiente();
				if($amount < 0)
					throw new ExceptionSumaNegativa();
				$this->balance -= $amount;
			}
		}




		class Banking{

			private $accounts = array();

			public function addAccount(Account $acc){
				$this->accounts[] = $acc;
			}

			public function displayAccounts(){
				foreach($this->accounts as $acc){
					echo 'Balance: '.$acc->getBalance().'<br/>';
				}
			}

			// removeAccount

		}

		$bank = new Banking();

		$a1 = new Account(2300);
		$a2 = new Account(10000);

		$bank->addAccount($a1);
		$bank->addAccount($a2);

		$bank->displayAccounts();



	?>
</body>
</html>