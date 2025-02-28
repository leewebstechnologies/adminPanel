<?php
require "config/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if (isset($pageTitle)) {
      echo $pageTitle;
    } else {
      echo webSetting("title") ?? "Device Service";
    }
    ?>
  </title>
  <meta name="description" content="<?php echo webSetting('meta_description') ?? 'Meta Description'; ?>">
  <meta name="keyword" content="<?php echo webSetting('meta_keyword') ?? 'Meta Keyword'; ?>">
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
  <?php include("navbar.php"); ?>