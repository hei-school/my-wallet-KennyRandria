import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Portfolio {
    private double balance;
    private String username;
    private String password;
    private String cin;
    private String cardNumber;
    private String visa;
    private String drivingLicense;
    private String photoId;
    private List<String> transactions;

    public Portfolio(String username, String password, String cin, String cardNumber, String visa, String drivingLicense, String photoId) {
        this.balance = 0;
        this.username = username;
        this.password = password;
        this.cin = cin;
        this.cardNumber = cardNumber;
        this.visa = visa;
        this.drivingLicense = drivingLicense;
        this.photoId = photoId;
        this.transactions = new ArrayList<>();
    }

    public void deposit(double amount) {
        if (amount > 0) {
            balance += amount;
            transactions.add("Deposit: +" + amount);
        }
    }

    public void withdraw(double amount) {
        if (amount > 0 && amount <= balance) {
            balance -= amount;
            transactions.add("Withdrawal: -" + amount);
        } else {
            System.out.println("Insufficient funds or invalid withdrawal amount.");
        }
    }

    public void displayBalance() {
        System.out.println("Current balance: " + balance);
    }

    public boolean authenticate(String inputUsername, String inputPassword) {
        return inputUsername.equals(username) && inputPassword.equals(password);
    }

    public void displayTransactions() {
        System.out.println("Transaction history:");
        for (String transaction : transactions) {
            System.out.println(transaction);
        }
    }

public static void main(String[] args) {
        String username = "your_username";
        String password = "your_password";
        String cin = "123456789";
        String cardNumber = "1234-5678-9012-3456";
        String visa = "0123456789012345";
        String drivingLicense = "DL123456789";
        String photoId = "photo_id_base64_encoded";

        Portfolio portfolio = new Portfolio(username, password, cin, cardNumber, visa, drivingLicense, photoId);

        // Authentication
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter username: ");
        String enteredUsername = scanner.nextLine();
        System.out.print("Enter password: ");
        String enteredPassword = scanner.nextLine();

        if (portfolio.authenticate(enteredUsername, enteredPassword)) {
            // Perform operations after successful authentication
            portfolio.deposit(1000);
            portfolio.withdraw(500);
            portfolio.displayBalance();
            portfolio.displayTransactions();
        } else {
            System.out.println("Authentication failed. Access denied.");
        }
    }
}