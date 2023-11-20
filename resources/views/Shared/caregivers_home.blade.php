<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
    <title>Shady Oaks Retirement Village</title>
</head>
<body>
    <header>
        <div class="header">
            <img src="{{url('/images/logo.jpg')}}" alt="logo">
        </div>
    </header>
    
    <div class="content">
        <h1>Caregiver's Home</h1>
        <div class="checkboxSec">
            <form>
                <div class="checkboxInds">
                    <label for="patientName" class="caretaker_checks">Name</label><br>
                    <input type="text" id="patientName" name="patientName" class="caretaker_checks">
                </div class="checkboxInds">
                <div class="checkboxInds">
                    <label for="morningMed" class="caretaker_checks">Morning Medicine</label><br>
                    <input type="checkbox" id="morningMed" name="morningMed" class="caretaker_checks">
                </div class="checkboxInds">
                <div class="checkboxInds">
                    <label for="afternoonMed" class="caretaker_checks">Afternoon Medicine</label><br>
                    <input type="checkbox" id="afternoonMed" name="afternoonMed" class="caretaker_checks">
                </div class="checkboxInds">
                <div class="checkboxInds">
                    <label for="nightMed" class="caretaker_checks">Night Medicine</label><br>
                    <input type="checkbox" id="nightMed" name="nightMed" class="caretaker_checks">
                </div class="checkboxInds">
                <div class="checkboxInds">
                    <label for="breakfast" class="caretaker_checks">Breakfast</label><br>
                    <input type="checkbox" id="breakfast" name="breakfast" class="caretaker_checks">
                </div class="checkboxInds">
                <div class="checkboxInds">
                    <label for="lunch" class="caretaker_checks">Lunch</label><br>
                    <input type="checkbox" id="lunch" name="lunch" class="caretaker_checks">
                </div class="checkboxInds">
                <div class="checkboxInds">
                    <label for="dinner" class="caretaker_checks">Dinner</label><br>
                    <input type="checkbox" id="dinner" name="dinner" class="caretaker_checks">
                </div class="checkboxInds"><br>
                <input type="submit" id="caregiverSubmit" value="Ok" class="caretaker_checks">
            </form>
        </div>
    </div>
    
    @section('footer')
        <footer>
        </footer>
    @endsection
</body>
</html>