<?php

class User{
  private $user;
  private $conn;


  public function __construct($conn,$user){
    $this->conn=$conn;
    $user_details_query=mysqli_query($conn,"SELECT * FROM users WHERE username='$user'");
    $this->user=mysqli_fetch_array($user_details_query);
  }

  public function getNumPosts(){
    $username=$this->user['username'];
    $sql="SELECT num_posts FROM users WHERE username='$username'";
    $query=mysqli_query($this->conn,$sql);
    $row=mysqli_fetch_array($query);
    return $row['num_posts'];
  }


  public function getUsername(){
    return $this->user['username'];
  }

  public function getFirstAndLastName(){
    $username=$this->user['username'];
    $query=mysqli_query($this->conn,"SELECT first_name,last_name FROM users WHERE username='$username'");
    $row=mysqli_fetch_array($query);
    return $row['first_name']. " ". $row['last_name'];
  }
}