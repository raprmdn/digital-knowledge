@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('h1', 'Ops, Something hapenning!')
@section('message', __('Server Error'))
