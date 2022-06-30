<?php
$data =[
  'title' => $title,
  'index' => $index
];
$this->load->view('alternatif/template/header',$data);
$this->load->view('alternatif/template/navbar');
$this->load->view('alternatif/template/sidebar',$data);
$this->load->view($content);
$this->load->view('alternatif/template/footer');
 ?>
