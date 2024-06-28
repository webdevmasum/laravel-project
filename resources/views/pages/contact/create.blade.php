@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Contact"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Contact"]);

    echo Form::open_laravel(["route"=>"contacts"]);
    echo Form::text(["name"=>"name","label"=>"Name"]);
    echo Form::text(["name"=>"mobile","label"=>"Mobile"]);
    echo Form::text(["name"=>"address","label"=>"Address"]);
    
    echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
    echo Form::close();
    
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection