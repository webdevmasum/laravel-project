@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Product"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Product"]);

    echo Form::open_laravel(["route"=>"products"]);
    echo Form::text(["name"=>"name","label"=>"Name"]);
    echo Form::text(["name"=>"offer_price","label"=>"Offer Price"]);
    echo Form::text(["name"=>"regular_price","label"=>"Regular Price"]);
    echo Form::text(["name"=>"product_category","label"=>"Product Category"]);
    echo Form::text(["name"=>"uom","label"=>"Uom"]);
    echo Form::text(["name"=>"quantity","label"=>"Quantity"]);
    echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
    echo Form::close();
    
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection