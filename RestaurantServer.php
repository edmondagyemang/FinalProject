<?php
require_once __DIR__ . '/RestaurantDatabase.php';

class RestaurantPortal {
    private $db;

    public function __construct() {
        $this->db = new RestaurantDatabase();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';

        try {
            switch ($action) {
                case 'addReservation':
                    $this->addReservation();
                    break;
                case 'viewReservations':
                    $this->viewReservations();
                    break;
                case 'addCustomer':
                    $this->addCustomer();
                    break;
                default:
                    $this->home();
            }
        } catch (Exception $e) {
            $this->handleError($e->getMessage());
        }
    }

    private function home() {
        include 'templates/home.php';
    }

    private function addReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customer_name'];
            $reservationTime = $_POST['reservation_time'];
            $numberOfGuests = $_POST['number_of_guests'];
            $specialRequests = $_POST['special_requests'];

            $this->db->addReservation($customerName, $reservationTime, $numberOfGuests, $specialRequests);
            header("Location: index.php?action=viewReservations&message=Reservation Added Successfully");
            exit;
        } else {
            include 'templates/addReservation.php';
        }
    }

    private function viewReservations() {
        $reservations = $this->db->getAllReservations();
        include 'templates/viewReservations.php';
    }

    private function addCustomer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customer_name'];
            $contactInfo = $_POST['contact_info'];

            $this->db->addCustomer($customerName, $contactInfo);
            echo "Customer added successfully.";
        } else {
            include 'templates/addCustomer.php';
        }
    }

    private function searchPreferences() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerId = $_POST['customer_id'];
            $preferences = $this->db->searchPreferences($customerId);
            include __DIR__ . '/templates/searchPreferences.php';
        } else {
            $preferences = null;
            include __DIR__ . '/templates/searchPreferences.php';
        }
    }
    
    private function deleteReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reservationId = $_POST['reservation_id'];
            $this->db->deleteReservation($reservationId);
            header("Location: index.php?action=viewReservations&message=Reservation Deleted Successfully");
            exit;
        }
    }
    

    private function handleError($message) {
        echo "<h1>Error</h1>";
        echo "<p>$message</p>";
        echo '<a href="index.php">Back to Home</a>';
    }
}
?>
