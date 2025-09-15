<?php
include('data/databases.php');


if (isset($_POST['submit'])) {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $squl = "INSERT INTO contactus(name,email,Message)Values('$name','$email','$message')";
    
    if($conn->query($squl)=== True){
    echo "<script>
            alert('Your message has been sent successfully!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Error! Please try again.');
            window.location.href = 'contact.php';
          </script>";
}

    $conn->close();
}
?>