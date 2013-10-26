<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$text = $_POST['text'];

$subject_email = "Question from: " . $name;
$text_email = "Subject: " . $subject . "----- Comment: " . $text;

$headers = 'From:' . $email;

echo mail("info@ufbowling.com", $subject_email, $text_email, $headers);

header('Location: ' . $_SERVER['HTTP_REFERER']);