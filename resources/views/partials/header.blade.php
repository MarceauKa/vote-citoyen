<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ $page_title ?? 'Accueil' }} - {{ config('app.name', 'Laravel') }}
    </title>
    <meta name="description" content="{{ $page_description ?? '' }}">
    <link rel="icon" type="image/png" href="/favicon.png">
    @include('partials.styles')
</head>