class Wallet {
  constructor(username, password, cin, cardNumber, visa, drivingLicense, photoId) {
      this.balance = 0;
      this.username = username;
      this.password = password;
      this.cin = cin;
      this.cardNumber = cardNumber;
      this.visa = visa;
      this.drivingLicense = drivingLicense;
      this.photoId = photoId;
      this.transactions = [];
  }

  deposit(amount) {
      if (amount > 0) {
          this.balance += amount;
          this.transactions.push(`Deposit: +${amount}`);
      }
  }

  withdraw(amount) {
      if (amount > 0 && amount <= this.balance) {
          this.balance -= amount;
          this.transactions.push(`Withdrawal: -${amount}`);
      } else {
          console.log("Insufficient funds or invalid withdrawal amount.");
      }
  }

  displayBalance() {
      console.log(`Current balance: ${this.balance}`);
  }

  authenticate(inputUsername, inputPassword) {
      return inputUsername === this.username && inputPassword === this.password;
  }

  displayTransactions() {
      console.log("Transaction history:");
      this.transactions.forEach(transaction => {
          console.log(transaction);
      });
  }
}
// Example usage:
const username = "your_username";
const password = "your_password";
const cin = "123456789";
const cardNumber = "1234-5678-9012-3456";
const visa = "0123456789012345";
const drivingLicense = "DL123456789";
const photoId = "photo_id_base64_encoded";

const portfolio = new Portfolio(username, password, cin, cardNumber, visa, drivingLicense, photoId);

// Authentification
const enteredUsername = prompt("Enter username:");
const enteredPassword = prompt("Enter password:");

if (portfolio.authenticate(enteredUsername, enteredPassword)) {
    // Perform operations after successful authentication
    portfolio.deposit(1000);
    portfolio.withdraw(500);
    portfolio.displayBalance();
    portfolio.displayTransactions();
} else {
    console.log("Authentication failed. Access denied.");
}