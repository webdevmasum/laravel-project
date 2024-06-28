@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Show Supplier"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Show Supplier"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$supplier->id</td></tr>";
 echo "<tr><th>Name</th><td>$supplier->name</td></tr>";
 echo "<tr><th>Mobile</th><td>$supplier->mobile</td></tr>";
 echo "<tr><th>Email</th><td>$supplier->email</td></tr>";
 echo "<tr><th>Address</th><td>$supplier->address</td></tr>";
 
 echo "</table>";
 echo Html::link(["route"=>url("suppliers"),"text"=>"Manage"]);
 echo Page::content_close();
 echo Page::body_close();

?>

@endsection