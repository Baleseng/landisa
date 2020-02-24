<?php
  $userid_entered = $_POST['userid'];
  $name_entered = $_POST['name'];
  $surname_entered = $_POST['surname'];
  $profileimg_entered = $_POST['profileimg'];
  
  $post_entered = $_POST['post'];
  $display_entered = $_POST['display_post'];

  $table_entered = $_POST['confirmemailuser'];
  $postcard_entered = $_POST['postcard'];
  $datepicker = $_POST['postdate'];

  include("../config/config.php");

  $val = mysqli_query($conn, "select 1 from $table_entered");
  if($val !== FALSE){
    if ((!empty($name_entered)) && (!empty($post_entered))){
      mysqli_query($conn, "
        INSERT INTO $table_entered (
          userid, 
          name, 
          surname, 
          profileimg, 
          post, 
          confirmemailuser, 
          postcard,
          display_post, 
          postdate
        ) VALUES (
          '$userid_entered',
          '$name_entered',
          '$surname_entered',
          '$profileimg_entered',
          '$post_entered',
          '$table_entered',
          '$postcard_entered',
          '$display_entered',
          '$datepicker'
        )
      ");
    }

    $result= mysqli_query($conn, "
      SELECT * 
      FROM $table_entered 
      ORDER BY postID DESC" ) 
      or die("SELECT Error: ".mysqli_error()); 

    while ($row = mysqli_fetch_array($result)){ 
      $postid_field= $row['postID'];
      $userid_field= $row['userid'];
      $name_field= $row['name'];
      $surname_field= $row['surname'];
      $profileimg_field= $row['profileimg'];
      $table_field= $row['confirmemailuser'];

      $posting_display_field = $row['display_post'];
      $postcard_field= $row['postcard'];
      $post_field= $row['post'];

      $article_display_field = $row['display_article'];
      $article_field= $row['articlepost'];
      $article_title_field= $row['title'];
      $article_img_field= $row['articleimg'];
      $article_synopsis_field= $row['minarticle'];
      $article_section_field= $row['section'];

      $date_field= $row['postdate'];
      
      include "output_content_post.php";
    }
  }
  else{
    $createtable= "CREATE TABLE $table_entered
    ( ".
    "postID INT NOT NULL AUTO_INCREMENT, ".
    "userid VARCHAR(255) NOT NULL, ".
    "name VARCHAR(50) NOT NULL, ".
    "surname VARCHAR(50) NOT NULL, ".
    "profileimg VARCHAR(50) NOT NULL, ".
    "confirmemailuser VARCHAR(100) NOT NULL, ".

    "display_post VARCHAR(100) NOT NULL, ".
    "postcard VARCHAR(20) NOT NULL, ".
    "post VARCHAR(100) NOT NULL, ".

    "gallery VARCHAR(100) NOT NULL, ".
    "video VARCHAR(100) NOT NULL, ".
    "youtube VARCHAR(100) NOT NULL, ".


    "display_article VARCHAR(100) NOT NULL, ".
    "articlepost VARCHAR(100) NOT NULL, ".
    "title VARCHAR(100) NOT NULL, ".
    "articleimg VARCHAR(100) NOT NULL, ".
    "minarticle VARCHAR(100) NOT NULL, ".
    "section VARCHAR(100) NOT NULL, ".
    
    "postdate VARCHAR(12) NOT NULL, ".

    "PRIMARY KEY (postID)
    );
    ";
    $create= mysqli_query($conn, $createtable);
    
  if ($create){
    if ((!empty($name_entered)) && (!empty($post_entered))){
      mysqli_query($conn, "
        INSERT INTO $table_entered (
          userid, 
          name, 
          surname, 
          profileimg, 
          post, 
          confirmemailuser, 
          postcard,
          display_post, 
          postdate
        ) 
        VALUES (
          '$userid_entered',
          '$name_entered',
          '$surname_entered',
          '$profileimg_entered',
          '$post_entered',
          '$table_entered',
          '$postcard_entered',
          '$display_entered',
          '$datepicker'
        )
      ");
    }
      $result= mysqli_query($conn, "SELECT * FROM $table_entered ORDER BY postID DESC" ) or die("SELECT Error: ".mysqli_error()); 

      while ($row = mysqli_fetch_array($result)){
        $postid_field= $row['postID'];
        $userid_field= $row['userid'];
        $name_field= $row['name'];
        $surname_field= $row['surname'];
        $profileimg_field= $row['profileimg'];
        $table_field= $row['confirmemailuser'];

        $posting_display_field = $row['display_post'];
        $postcard_field= $row['postcard'];
        $post_field= $row['post'];

        $article_display_field = $row['display_article'];
        $article_field= $row['articlepost'];
        $article_title_field= $row['title'];
        $article_img_field= $row['articleimg'];
        $article_synopsis_field= $row['minarticle'];
        $article_section_field= $row['section'];

        $date_field= $row['postdate'];

        include "output_content_post.php";
      }
    }//if createtable
  }//else
?> 
