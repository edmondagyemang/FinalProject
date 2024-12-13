<html>
<head><title>View Reservations</title></head>
<body>
    <h1>All Reservations</h1>
    <table border="1">
        <tr>
            <th>Reservation ID</th>
            <th>Customer ID</th>
            <th>Reservation Time</th>
            <th>Number of Guests</th>
            <th>Special Requests</th>
        </tr>
        <?php if (!empty($reservations)): ?>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= htmlspecialchars($reservation['reservationId']) ?></td>
                <td><?= htmlspecialchars($reservation['customerId']) ?></td>
                <td><?= htmlspecialchars($reservation['reservationTime']) ?></td>
                <td><?= htmlspecialchars($reservation['numberOfGuests']) ?></td>
                <td><?= htmlspecialchars($reservation['specialRequests']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No reservations found.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="index.php">Back to Home</a>
</body>
</html>