<!DOCTYPE html>
<html lang="en">
@extends('layouts.admin')
@section ('header', 'Home')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan link CSS dari CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan link CSS tambahan -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>


    <!-- Tambahkan script JavaScript dari CDN Bootstrap (tidak wajib) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@endsection