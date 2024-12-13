
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation</title>
</head>
<body>
    <h1>Add Reservation</h1>
    <form method="POST" action="index.php?action=addReservation">
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" id="customer_name" required><br>
        
        <label for="reservation_time">Reservation Time:</label>
        <input type="datetime-local" name="reservation_time" id="reservation_time" required><br>
        
        <label for="number_of_guests">Number of Guests:</label>
        <input type="number" name="number_of_guests" id="number_of_guests" required><br>
        
        <label for="special_requests">Special Requests:</label>
        <textarea name="special_requests" id="special_requests"></textarea><br>
        
        <button type="submit">Submit</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
