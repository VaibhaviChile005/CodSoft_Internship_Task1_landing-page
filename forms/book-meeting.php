<?php
  
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $book-meeting = new PHP_Email_Form;
  $book-meeting->ajax = true;
  
  $book-meeting->to = $receiving_email_address;
  $book-meeting->from_name = $_POST['name'];
  $book-meeting->from_email = $_POST['email'];
  $book-meeting->subject = "New table booking request from the website";

  $book-meeting->add_message( $_POST['name'], 'Name');
  $book-meeting->add_message( $_POST['email'], 'Email');
  $book-meeting->add_message( $_POST['phone'], 'Phone', 4);
  $book-meeting->add_message( $_POST['date'], 'Date', 4);
  $book-meeting->add_message( $_POST['time'], 'Time', 4);
  $book-meeting->add_message( $_POST['people'], '# of people', 1);
  $book-meeting->add_message( $_POST['message'], 'Message');

  echo $book-meeting->send();
?>
