<?php
// Include the necessary models
require_once 'models/User.php';

class UserController {

    // The dashboard method to display user-specific data
    public function dashboard() {
        // Fetch all users or any data you need to show on the dashboard
        // For this example, let's fetch all users
        $users = User::getAllUsers();

        // Include the dashboard view to display the users
        require_once 'views/dashboard.phtml';
    }
}
?>
