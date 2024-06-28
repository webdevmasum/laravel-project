@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Show Contact"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Show Contact"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$contact->id</td></tr>";
 echo "<tr><th>Name</th><td>$contact->name</td></tr>";
 echo "<tr><th>Mobile</th><td>$contact->mobile</td></tr>";
 echo "<tr><th>Address</th><td>$contact->address</td></tr>";
 
 echo "</table>";
 echo Html::link(["route"=>url("contacts"),"text"=>"Manage"]);
 echo Page::content_close();
 echo Page::body_close();

?>

@endsection