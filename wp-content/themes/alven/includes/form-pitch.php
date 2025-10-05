<?php

$mailtoContact = get_field('mailList', 'option');

$status = '';
$errorSend = '';

// Error flags for each field
$errorFirstname = $errorLastname = $errorEmail = $errorCompany = $errorWebsite = $errorLinkedin = '';
$errorDate = $errorAddress = $errorDesc = $errorRaising = $errorStage = '';
$errorSector = $errorTech = $errorBusiness = $errorDeck = $errorRef = '';

// Sanitize and repopulate form values
$firstname = isset($_POST['firstname']) ? strip_tags(stripslashes($_POST['firstname'])) : '';
$lastname = isset($_POST['lastname']) ? strip_tags(stripslashes($_POST['lastname'])) : '';
$email = isset($_POST['realemail']) ? strip_tags(stripslashes($_POST['realemail'])) : '';
$companyname = isset($_POST['companyname']) ? strip_tags(stripslashes($_POST['companyname'])) : '';
$website = isset($_POST['website']) ? strip_tags(stripslashes($_POST['website'])) : '';
$linkedin = isset($_POST['linkedin']) ? strip_tags(stripslashes($_POST['linkedin'])) : '';
$date = isset($_POST['date']) ? strip_tags(stripslashes($_POST['date'])) : '';
$address = isset($_POST['address']) ? strip_tags(stripslashes($_POST['address'])) : '';
$desc = isset($_POST['desc']) ? strip_tags(stripslashes($_POST['desc'])) : '';
$raising = isset($_POST['raising']) ? strip_tags(stripslashes($_POST['raising'])) : '';
$stage = isset($_POST['stage']) ? strip_tags(stripslashes($_POST['stage'])) : '';
$sector = isset($_POST['sector']) ? strip_tags(stripslashes($_POST['sector'])) : '';
$tech = isset($_POST['tech']) ? strip_tags(stripslashes($_POST['tech'])) : '';
$business = isset($_POST['business']) ? strip_tags(stripslashes($_POST['business'])) : '';
$ref = isset($_POST['ref']) ? strip_tags(stripslashes($_POST['ref'])) : '';

// Honeypot fields
$honeymail = isset($_POST['email']) ? strip_tags(stripslashes($_POST['email'])) : '';
$honeyname = isset($_POST['fullname']) ? strip_tags(stripslashes($_POST['fullname'])) : '';

if (isset($_POST['submitpitch'])) {
    if (!empty($honeymail) || !empty($honeyname)) {
        $status = 'error';
        $errorSend = __('Spam detected!', 'alven');
        return;
    }

    // Required field validation
    if (empty($firstname)) { $status = 'error'; $errorFirstname = true; }
    if (empty($lastname)) { $status = 'error'; $errorLastname = true; }
    if (empty($email) || !filter_var(sanitize_email($email), FILTER_VALIDATE_EMAIL)) {
        $status = 'error'; $errorEmail = true;
    }
    if (empty($companyname)) { $status = 'error'; $errorCompanyname = true; }
    if (empty($desc)) { $status = 'error'; $errorDesc = true; }
    if (empty($raising)) { $status = 'error'; $errorRaising = true; }
    if (empty($stage)) { $status = 'error'; $errorStage = true; }

    // File upload validation (required)
    if (
        !isset($_FILES['deck']) ||
        $_FILES['deck']['error'] !== UPLOAD_ERR_OK ||
        empty($_FILES['deck']['tmp_name'])
    ) {
        $status = 'error';
        $errorDeck = true;
    } else {
        $allowed_exts = ['pdf', 'key', 'ppt', 'pptx'];
        $deck_name = $_FILES['deck']['name'];
        $deck_tmp = $_FILES['deck']['tmp_name'];
        $deck_ext = strtolower(pathinfo($deck_name, PATHINFO_EXTENSION));

        if (!in_array($deck_ext, $allowed_exts)) {
            $status = 'error';
            $errorDeck = true;
        } elseif ($_FILES['deck']['size'] > 20971520) { // 20MB
            $status = 'error';
            $errorDeck = true;
        }
    }

    // If any validation failed
    if ($status === 'error') {
        $errorSend = __('Please check the fields in red. Some required values are missing or invalid.', 'alven');
        return;
    }

    // If no errors, proceed with email
    $name = sprintf('%s %s', $firstname, $lastname);
    $subject = 'New pitch submitted on alven.co';
    $headers = [];
    $attachments = [];

    // Move file to temp directory and attach
    $upload_dir = wp_upload_dir();
    $deck_path = $upload_dir['path'] . '/' . basename($deck_name);
    move_uploaded_file($deck_tmp, $deck_path);
    $attachments[] = $deck_path;

    // Compose email body
    $content = '';
    $content .= "Name: $name\r\n";
    $content .= "Email: $email\r\n";
    $content .= "Company: $companyname\r\n";
    $content .= "Website: $website\r\n";
    $content .= "LinkedIn: $linkedin\r\n";
    $content .= "Date: $date\r\n";
    $content .= "Address: $address\r\n";
    $content .= "Description: $desc\r\n";
    $content .= "Raising: $raising\r\n";
    $content .= "Investment Stage: $stage\r\n";
    $content .= "Sector: $sector\r\n";
    $content .= "Technology: $tech\r\n";
    $content .= "Business Model: $business\r\n";
    $content .= "Referral: $ref\r\n\r\n";

    // Send email with attachment
    $sent = wp_mail($mailtoContact, $subject, $content, $headers, $attachments);

    if ($sent) {
        $status = 'success';

        // Autmatic answer to the sender
        $replySubject = __('Your pitch has been received', 'alven');
    
        $replyHeaders = [];
        $replyHeaders[] = 'Content-Type: text/plain; charset=UTF-8';
        $replyHeaders[] = 'From: Alven <noreply@alven.co>';

        $replyBody = __('Hi', 'alven') . (!empty($name) ? " $name" : "") . ",\n\n";
        $replyBody .= __('Thank you for submitting your pitch to Alven. We’ve received your application successfully.', 'alven') . "\n\n";
        $replyBody .= __('Our team will review it and get back to you as soon as possible.', 'alven') . "\n\n";
        $replyBody .= __('Best regards,', 'alven') . "\n";
        $replyBody .= __('The Alven Team', 'alven');

        wp_mail($email, $replySubject, $replyBody, $replyHeaders);
    } else {
        $status = 'error';
        $errorSend = __('Sorry, something went wrong. Please try again later.', 'alven');
    }
}
?>