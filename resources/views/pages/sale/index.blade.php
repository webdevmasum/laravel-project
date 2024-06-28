
@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Order"]);
echo Page::body_open();
echo Page::content_open(["button"=>"Order","route"=>"orders"]);
?>

<?php

echo Table::get_array_table($orders,["id","date","customer","mobile","shipping_address","order_total"],"orders");

?>

{{$orders->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection