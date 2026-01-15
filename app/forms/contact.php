<?php

namespace App;

add_action('admin_post_nopriv_simple_form_submit', __NAMESPACE__ . '\\handle_simple_form_submit');
add_action('admin_post_simple_form_submit', __NAMESPACE__ . '\\handle_simple_form_submit');

function handle_simple_form_submit() {
    $email = sanitize_email($_POST['email'] ?? '');

    if (!is_email($email)) {
        wp_safe_redirect(add_query_arg('error', 'invalid_email', wp_get_referer()));
        exit;
    }

    // --- Sende email ---
    $to = get_option('info@fokus.design'); // her kan du ændre til en fast email eller ACF option
    $subject = 'Ny tilmelding via formular';
    $message = "Der er en ny tilmelding med email:\n\n" . $email;
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    wp_mail($to, $subject, $message, $headers);
    // --- /send email ---

    // --- Redirect til takke-side ---
    $thank_you_url = home_url('/tak/');
    wp_safe_redirect($thank_you_url);
    exit;
}
