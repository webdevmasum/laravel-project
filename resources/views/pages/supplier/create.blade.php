@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Supplier"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Supplier"]);

    echo Form::open_laravel(["route"=>"suppliers"]);
    echo Form::text(["name"=>"name","label"=>"Name"]);
    echo Form::text(["name"=>"mobile","label"=>"Mobile"]);
    echo Form::text(["name"=>"email","label"=>"email"]);
    echo Form::text(["name"=>"address","label"=>"Address"]);
    
    echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
    echo Form::close();
    
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection