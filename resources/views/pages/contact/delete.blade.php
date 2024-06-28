@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Delete Contact"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Are you sure to delete?"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$contact->id</td></tr>";
 echo "<tr><th>Name</th><td>$contact->name</td></tr>";
 echo "</table>";
 echo Form::open_laravel(["route"=>"contacts/$contact->id","method"=>"DELETE"]); 
 echo "<div class='btn-group'>";
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Delete","class"=>"btn btn-danger"]);
 echo Html::link(["route"=>url("contacts"),"text"=>"Manage"]);
 echo "</div>";
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection