<?php
require_once __DIR__ . '/Database.php';

class RestaurantDatabase {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function addCustomer($customerName, $contactInfo) {
        $sql = "INSERT INTO customers (customerName, contactInfo) VALUES (:customerName, :contactInfo)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':customerName' => $customerName, ':contactInfo' => $contactInfo]);
    }

    public function addReservation($customerName, $reservationTime, $numberOfGuests, $specialRequests) {
        $sql = "SELECT customerId FROM customers WHERE customerName = :customerName";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':customerName' => $customerName]);
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$customer) {
            throw new Exception("Customer not found. Please add the customer first.");
        }

        $sql = "INSERT INTO reservations (customerId, reservationTime, numberOfGuests, specialRequests)
                VALUES (:customerId, :reservationTime, :numberOfGuests, :specialRequests)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':customerId' => $customer['customerId'],
            ':reservationTime' => $reservationTime,
            ':numberOfGuests' => $numberOfGuests,
            ':specialRequests' => $specialRequests,
        ]);
    }

    public function getAllReservations() {
        $sql = "SELECT * FROM reservations";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteReservation($reservationId) {
        $sql = "DELETE FROM reservations WHERE reservationId = :reservationId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':reservationId' => $reservationId]);
    }

    // Add a special request to an existing reservation
    public function addSpecialRequest($reservationId, $requests) {
        $sql = "UPDATE reservations SET specialRequests = :specialRequests WHERE reservationId = :reservationId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':specialRequests' => $requests,
            ':reservationId' => $reservationId,
        ]);
    }

    // Find all reservations for a specific customer
    public function findReservations($customerId) {
        $sql = "SELECT * FROM reservations WHERE customerId = :customerId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':customerId' => $customerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search dining preferences for a specific customer
    public function searchPreferences($customerId) {
        $sql = "SELECT favoriteTable, dietaryRestrictions FROM diningPreferences WHERE customerId = :customerId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':customerId' => $customerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Single row for preferences
    }
}
?>
