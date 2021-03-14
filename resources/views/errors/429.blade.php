@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('h1', 'Ops, Something hapenning!')
@section('message', __('Too Many Requests'))
