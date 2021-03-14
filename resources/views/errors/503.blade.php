@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('h1', 'Gateway Timeout Error')
@section('message', __('We are very sorry for inconvenience. It looks like some how our server did not receive a timely response.'))
