@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Supplier"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Create Supplier","button"=>"Supplier","route"=>"suppliers"]);
?>



<?php

echo Table::get_array_table($suppliers,["id","name","mobile","email","address"],"suppliers");

?>



<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection