<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>
    <h1>Add Customer</h1>
    <form method="POST" action="index.php?action=addCustomer">
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" id="customer_name" required><br>
        
        <label for="contact_info">Contact Info:</label>
        <input type="text" name="contact_info" id="contact_info" required><br>
        
        <button type="submit">Add Customer</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>

