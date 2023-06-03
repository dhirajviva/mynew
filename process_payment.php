<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the amount entered by the user
  $amount = $_POST["TXN_AMOUNT"];

  // Generate a unique transaction ID
  $transactionId = uniqid();

  // Create the URL with transaction ID and amount for Google Pay
  $googlePayUrl = "https://pay.google.com/payments/u/0/transaction/details?transaction_id=$transactionId&price=$amount";

  // Generate the QR code using endroid/qr-code library (assuming it's installed via Composer)
 
 require("qr-code-master\src\QrCode.php");

  $qrCode = new QrCode($googlePayUrl);
  $qrCode->setSize(200); // Adjust the size of the QR code as needed
  $qrCode->setMargin(10); // Adjust the margin of the QR code as needed

  // Output the HTML with the QR code and amount
  echo '<h1>Payment Details</h1>';
  echo '<img src="' . $qrCode->getDataUri() . '" alt="Google Pay QR Code">';
  echo '<p>Amount: $' . $amount . '</p>';
}
?>
