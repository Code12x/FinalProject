@extends('Shared/_layout')

@section('title', 'Payment')

@section('css')
<style>
    .content {
        padding: 5px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .alert {
        padding: 5px;
        margin: 2px;
        background-color: red;
    }

</style>
@endsection

@section('content')

<p class="alert" hidden></p>

<form action="_payment" method="POST">
    <label for="patientId">Patient ID: <input type="text" name="patientId" id="patientId"></label>
    <label for="totalDue">Total Due: <input type="text" name="totalDue" id="totalDue" disabled></label>
    <label for="newPayment">New Payment: <input type="text" name="newPayment" id="newPayment"></label>
    <input type="submit" value="Confirm">
</form>

@endsection

@section('script')

<script>
    $("#patientId").on('input', function(e) {
        let id = e.currentTarget.value;
        $.post('_user-payment', { "id": id }, function(data) {
            if (data.success) {
                $("#totalDue").val("$" + data.data);
            }else {
                $("#totalDue").val("");
            }
        });
    });
</script>

@endsection