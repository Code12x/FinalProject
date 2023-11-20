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
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <br>
        <input type="submit" value="Submit">
        
    </form>
@endsection