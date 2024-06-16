<?php


//a list of users in array to just simulate the task
$users = ['Mike Dave', 'Jimmy iovine', 'Malia Janny', 'Ali rakim', 'Bob Brown', 'Christopher Sanders', 'Wakanda Manna', 'Dave Paul', 'Eilein mima', 'Fay rahs'];


//fetch the input
$q = $_GET['q'];

// filter based on what user inputs
$filteredUsers = array_filter($users, function($user) use ($q) {
    return stripos($user, $q) !== false;
  });

  foreach ($filteredUsers as $user) {
    echo "<a href='#' onclick='fillUser(\"$user\"); return false;'>$user</a><br>";
  }