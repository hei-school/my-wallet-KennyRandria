<?php
session_start();

class Portfolio {
    private $balance;
    private $username;
    private $password;
    private $cin;
    private $cardNumber;
    private $visa;
    private $drivingLicense;
    private $photoId;
    private $transactions;

    public function __construct($username, $password, $cin, $cardNumber, $visa, $drivingLicense, $photoId) {
        $this->balance = 0;
        $this->username = $username;
        $this->password = $password;
        $this->cin = $cin;
        $this->cardNumber = $cardNumber;
        $this->visa = $visa;
        $this->drivingLicense = $drivingLicense;
        $this->photoId = $photoId;
        $this->transactions = [];
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            $this->transactions[] = "Deposit: +$amount";
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            $this->transactions[] = "Withdrawal: -$amount";
        } else {
            echo "Insufficient funds or invalid withdrawal amount.";
        }
    }

    public function displayBalance() {
        echo "Current balance: $this->balance";
    }

    public function authenticate($inputUsername, $inputPassword) {
        return $inputUsername === $this->username && $inputPassword === $this->password;
    }

    public function displayTransactions() {
        echo "Transaction history:<br>";
        foreach ($this->transactions as $transaction) {
            echo "$transaction<br>";
        }
    }
    
}

// Example usage:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your form submission logic here...
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cin = $_POST['cin'];
    $cardNumber = $_POST['cardNumber'];
    $visa = $_POST['visa'];
    $drivingLicense = $_POST['drivingLicense'];
    $photoId = $_POST['photoId'];

    $portfolio = new Portfolio($username, $password, $cin, $cardNumber, $visa, $drivingLicense, $photoId);

    // Authentification
    $enteredUsername = $_POST['enteredUsername'];
    $enteredPassword = $_POST['enteredPassword'];

    if ($portfolio->authenticate($enteredUsername, $enteredPassword)) {
        // Perform operations after successful authentication
        $portfolio->deposit(1000);
        $portfolio->withdraw(500);
        $portfolio->displayBalance();
        $portfolio->displayTransactions();
    } else {
        echo "Authentication failed. Access denied.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
</head>
<body>

    <!-- Your HTML form for user input here -->

</body>
</html>