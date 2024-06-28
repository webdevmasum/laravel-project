@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Contact"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Create Contact","button"=>"Contact","route"=>"contacts"]);
?>



<?php

echo Table::get_array_table($contacts,["id","name","mobile","address"],"contacts");

?>



<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection