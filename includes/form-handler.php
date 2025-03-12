<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_form_submit'])) {
    $selected_products = isset($_POST['products']) ? $_POST['products'] : [];

    if (!empty($selected_products)) {
        $message = "Ο χρήστης επέλεξε τα παρακάτω προϊόντα:\n\n";

        foreach ($selected_products as $post_id) {
            $title = get_the_title($post_id);
            $quantity = isset($_POST['quantity'][$post_id]) ? intval($_POST['quantity'][$post_id]) : 1;
            $message .= "🔹 $title - Ποσότητα: $quantity\n";
        }

        // Στοιχεία email
        $to = "your-email@example.com"; // Άλλαξέ το με το email σου
        $subject = "Νέα Αίτηση από τη Φόρμα";
        $headers = "From: no-reply@yourwebsite.com\r\n";

        // Αποστολή email
        wp_mail($to, $subject, $message, $headers);
        
        echo "<p style='color:green;'>Η φόρμα στάλθηκε επιτυχώς!</p>";
    } else {
        echo "<p style='color:red;'>Παρακαλώ επιλέξτε τουλάχιστον ένα προϊόν.</p>";
    }
}
