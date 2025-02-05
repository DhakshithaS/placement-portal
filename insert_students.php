<?php
// Database connection variables
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "your_database_name"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Students_sub (Name, RollNo, Gender, Email, MobileNo, DOB, Degree, Branch, Batch, Native, NoOfCompanyPlaced, CompanyName1, CompanyPlaced, Organiser, Location, JoiningDate, CTC, MailConfirmation, InternshipLetter, LetterOfIntent, OfferLetter, StipendAmount, Action) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssisssiisssssdssssds", $name, $rollno, $gender, $email, $mobileno, $dob, $degree, $branch, $batch, $native, $noofcompanyplaced, $companyname1, $companyplaced, $organiser, $location, $joiningdate, $ctc, $mailconfirmation, $internshipletter, $letterofintent, $offerletter, $stipendamount, $action);

// Set parameters and execute
$name = $_POST['name'];
$rollno = $_POST['rollno'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobileno = $_POST['mobileno'];
$dob = $_POST['dob'];
$degree = $_POST['degree'];
$branch = $_POST['branch'];
$batch = $_POST['batch'];
$native = $_POST['native'];
$noofcompanyplaced = $_POST['noofcompanyplaced'];
$companyname1 = $_POST['companyname1'];
$companyplaced = $_POST['companyplaced'];
$organiser = $_POST['organiser'];
$location = $_POST['location'];
$joiningdate = $_POST['joiningdate'];
$ctc = $_POST['ctc'];
$mailconfirmation = $_POST['mailconfirmation'];
$internshipletter = $_POST['internshipletter'];
$letterofintent = $_POST['letterofintent'];
$offerletter = $_POST['offerletter'];
$stipendamount = $_POST['stipendamount'];
$action = 'Pending'; // You can set this as needed

if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();

