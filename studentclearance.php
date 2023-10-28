<?php

// Load the data for the approved and unapproved students tables
$approvedStudents = getApprovedStudents();
$unapprovedStudents = getUnapprovedStudents();

// Define the function to approve a student
function approveStudent($studentId) {
  // Approve the student in the database

  // Redirect the user back to the page
  header("Location: {$_SERVER['PHP_SELF']}");
}

// Define the function to disapprove a student
function disapproveStudent($studentId) {
  // Disapprove the student in the database

  // Redirect the user back to the page
  header("Location: {$_SERVER['PHP_SELF']}");
}

// Define the function to send a mail to a student
function sendMail($studentId) {
  // Send a mail to the student

  // Redirect the user back to the page
  header("Location: {$_SERVER['PHP_SELF']}");
}

// Iterate over the unapproved students and display them in a table row
foreach ($unapprovedStudents as $student) {
  echo "<tr>";
  echo "<td>";
  echo "<label class=\"au-checkbox\">";
  echo "<input type=\"checkbox\" name=\"student_ids[]\" value=\"{$student['id']}">";
  echo "<span class=\"au-checkmark\">" " </span>";
  echo "</label>";
  echo "</td>";
  echo "<td>{$student['name']}</td>";
  echo "<td>{$student['admission_no']}</td>";
  echo "<td>{$student['email']}</td>";
  echo "<td>{$student['year']}</td>";
  echo "<td>";
  echo "<span class=\"status--process text-danger\">unapproved</span>";
  echo "</td>";
  echo "<td>";
  echo "<div class=\"table-data-feature\">";
  echo "<button class=\"item hover hover-green\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Approve\" onclick=\"approveStudent({$student['id']})\">";
  echo "<i class=\"zmdi zmdi-check\"></i>";
  echo "</button>";
  echo "</div>";
  echo "</td>";
  echo "</tr>";
}

// Iterate over the approved students and display them in a table row
foreach ($approvedStudents as $student) {
  echo "<tr>";
  echo "<td>";
  echo "<label class=\"au-checkbox\">";
  echo "<input type=\"checkbox\" name=\"student_ids[]\" value=\"{$student['id']}">";
  echo "<span class=\"au-checkmark\"></span>";
  echo "</label>";
  echo "</td>";
  echo "<td>{$student['name']}</td>";
  echo "<td>{$student['admission_no']}</td>";
  echo "<td>{$student['email']}</td>";
  echo "<td>{$student['year']}</td>";
  echo "<td>";
  echo "<span class=\"status--process\">approved";
  echo "<span class=\"badge badge-pill badge-success\" ng-show=\"student.hash || student.sent\">";
  echo "sent";
  echo "</span>";
  echo "</span>";
  echo "</td>";
  echo "<td>";
  echo "<div class=\"table-data-feature\">";
  echo "<button class=\"item hover hover-red\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Disapprove\" onclick=\"disapproveStudent({$student['id']})\" disabled=\"{$student['disabled']}\">";
  echo "<i class=\"zmdi zmdi-delete\"></i>";
  echo "</button>";
  if ($user['id'] == $finalId) {
    echo "<button class=\"item hover hover-green\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Send\" onclick=\"sendMail({$student['id']})\" disabled=\"{$student['disabled']}\">";
    echo "<i class=\"zmdi zmdi-mail-send\"></i>";
    echo "</button>";
  }
  echo "</div>";
  echo "</td>";
  echo "</tr>";
}
<style>
 table {
  width: 100%;
  border-collapse: collapse;
  box-shadow: 0px 0px 15px #800000; /* maroon */
}

td {
  padding: 10px;
  border: 1px solid #ddd;
  background-color: #f5f5dc; /* cream */
}

.au-checkbox {
  position: relative;
}

.au-checkmark {
  position: absolute;
  top: 0;
  left: 0;
}

.status--process {
  color: #008000; /* green */
}

.badge {
  padding: 5px;
}

.table-data-feature {
  display: flex;
}

.item {
  margin-right: 10px;
}

.hover-red:hover {
  color: #ff0000; /* red */
}

.hover-green:hover {
  color: #008000; /* green */
}

/* Add animation */
@keyframes item-hover {
    from {transform: scale(1);}
    to {transform: scale(1.2);}
}

.item:hover {
    animation-name: item-hover;
    animation-duration: 0.5s;
}
  </style>
