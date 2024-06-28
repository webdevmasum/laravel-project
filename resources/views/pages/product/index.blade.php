@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Product"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Create Product","button"=>"Product","route"=>"products"]);
?>



<?php

echo Table::get_array_table($products,["id","name","offer_price","regular_price","category","uom","quantity"],"products");

?>



<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection