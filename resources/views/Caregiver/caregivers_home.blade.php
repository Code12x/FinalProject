@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>

</style>
@endsection

@section('content')
    
 
<h1>Caregiver's Home</h1>
        
<div id="forms">

</div>
    


@endsection

@section('script')
<script>
$(document).ready(function () 
{
    $.get('/caregiver/getPatients', function (data) {
        $.each(data, function (index, patient) 
        {
            $('#forms').append(`

            <form action="" method="post">
                <p>Name</p>
                
                <label for="mmed">Morning Med:</label>
                <input type="checkbox" id="mmed" name="">
                
                <label for="amed">Afternoon Med:</label>
                <input type="checkbox" id="amed" name="">

                <label for="nmed">Night Med:</label>
                <input type="checkbox" id="nmed" name="">
                
                <label for="breakfast">Breakfast:</label>
                <input type="checkbox" id="breakfast" name="">

                <label for="lunch">Lunch:</label>
                <input type="checkbox" id="lunch" name="">

                <label for="dinner">Dinenr:</label>
                <input type="checkbox" id="dinner" name="">
                
                <input type="submit" value="Submit">
            </form>
            <br>
            `);
        });
    });
});

</script>
@endsection