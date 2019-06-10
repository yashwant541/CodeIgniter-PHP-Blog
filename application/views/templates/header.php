<html>
	<head>
		<title>Blogger</title>
		<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
    <script src="http://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> 
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url() ?>">ciBLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>about">About</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>posts">Blog</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>categories">Categories</a>
      </li>

    </ul>
    <ul class="navbar-nav mr-auto navbar-right">
      <?php if(!$this->session->userdata('logged_in')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>users/register">Register<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>users/login">Login<span class="sr-only">(current)</span></a>
        </li>
      <?php endif; ?>
      <?php if($this->session->userdata('logged_in')): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>posts/create">Create Post<span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="<?php echo base_url() ?>categories/create">Create Category<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>users/logout">Logout<span class="sr-only">(current)</span></a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
<div class="container">
  <!-- Flash Messages -->
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_success')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('login_success').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('logout')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('logout').'</p>'; ?>
  <?php endif; ?>