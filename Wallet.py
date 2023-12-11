class Wallet:
    def __init__(self, username, password, cin, card_number, visa, driving_license, photo_id):
        self.balance = 0
        self.username = username
        self.password = password
        self.cin = cin
        self.card_number = card_number
        self.visa = visa
        self.driving_license = driving_license
        self.photo_id = photo_id
        self.transactions = []

    def deposit(self, amount):
        if amount > 0:
            self.balance += amount
            self.transactions.append(f"Deposit: +{amount}")

    def withdraw(self, amount):
        if amount > 0 and amount <= self.balance:
            self.balance -= amount
            self.transactions.append(f"Withdrawal: -{amount}")
        else:
            print("Insufficient funds or invalid withdrawal amount.")

    def display_balance(self):
        print(f"Current balance: {self.balance}")

    def authenticate(self, input_username, input_password):
        return input_username == self.username and input_password == self.password

    def display_transactions(self):
        print("Transaction history:")
        for transaction in self.transactions:
            print(transaction)

 # Example usage:
if __name__ == "__main__":
    username = "your_username"
    password = "your_password"
    cin = "123456789"
    card_number = "1234-5678-9012-3456"
    visa = "0123456789012345"
    driving_license = "DL123456789"
    photo_id = "photo_id_base64_encoded"

    portfolio = Portfolio(username, password, cin, card_number, visa, driving_license, photo_id)

    # Authentification
    entered_username = input("Enter username: ")
    entered_password = input("Enter password: ")

    if portfolio.authenticate(entered_username, entered_password):
        # Perform operations after successful authentication
        portfolio.deposit(1000)
        portfolio.withdraw(500)
        portfolio.display_balance()
        portfolio.display_transactions()
    else:
        print("Authentication failed. Access denied.")           