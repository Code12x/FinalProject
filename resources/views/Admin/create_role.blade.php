@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>
</style>
@endsection

@section('content')
    <form action="" method="post">
        <label for="rolename">Role name:</label><br>
        <input type="text" id = "rolename" name = "strName">
        <br>
        <label for="AccessLevel">Access Level:</label><br>
        <select id="AccessLevel" name="intAccessLevel">
            <option value="0">1</option>
            <option value="1">2</option>
            <option value="2">3</option>
            <option value="3">4</option>
            <option value="4">5</option>
            <option value="5">6</option>
        </select>
        <br>
        <input type="submit" value="Submit">
        
    </form>
@endsection