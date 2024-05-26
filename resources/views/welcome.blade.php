<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>{{ $title }}</title>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // reset select function
            function resetSelect(select, value){
                $(select).empty();
                $(select).attr('disabled', 'disabled');
                $(select).append('<option selected>'+value+'</option>');
                $('.alert').remove();
            }
            $(document).ready(function(){
                $.ajax({
                    url: '/api/quote',
                    type: 'GET',
                    success: function(response){
                        response.forEach(function(car){
                            $('#car-make').append('<option value="'+car.make+'">'+car.make+'</option>');
                        });
                    }
                });

                $('#car-make').change(function(){
                    resetSelect('#car-year', 'Select car year');
                    resetSelect('#car-model', 'Select car model');
                    resetSelect('#car-variant', 'Select car variant');
                    var make = $(this).val();
                    $.ajax({
                        url: '/api/quote',
                        data: {
                            make
                        },
                        type: 'GET',
                        success: function(response){
                            $('#car-year').removeAttr('disabled');
                            response.forEach(function(car){
                                $('#car-year').append('<option value="'+car.year+'">'+car.year+'</option>');
                            });
                        }
                    });
                });

                $('#car-year').change(function(){
                    resetSelect('#car-model', 'Select car model');
                    resetSelect('#car-variant', 'Select car variant');
                    var make = $('#car-make').val();
                    var year = $(this).val();
                    $.ajax({
                        url: '/api/quote',
                        data: {
                            make,
                            year
                        },
                        type: 'GET',
                        success: function(response){
                            response.forEach(function(car){
                                $('#car-model').removeAttr('disabled');
                                $('#car-model').append('<option value="'+car.model+'">'+car.model+'</option>');
                            });
                        }
                    });
                });

                $('#car-model').change(function(){
                    resetSelect('#car-variant', 'Select car variant');
                    var make = $('#car-make').val();
                    var year = $('#car-year').val();
                    var model = $(this).val();
                    $.ajax({
                        url: '/api/quote',
                        data: {
                            make,
                            year,
                            model
                        },
                        type: 'GET',
                        success: function(response){
                            response.forEach(function(car){
                                $('#car-variant').removeAttr('disabled');
                                $('#car-variant').append('<option value="'+car.variant+'">'+car.variant+'</option>');
                            });
                        }
                    });
                });

                $('#reset-car-form').click(function(e){
                    e.preventDefault();
                    $('#car-make').val('Select car make');
                    resetSelect('#car-year', 'Select car year');
                    resetSelect('#car-model', 'Select car model');
                    resetSelect('#car-variant', 'Select car variant');
                });

                // form on submit event
                $('form').submit(function(e){
                    e.preventDefault();
                    var make = $('#car-make').val();
                    var year = $('#car-year').val();
                    var model = $('#car-model').val();
                    var variant = $('#car-variant').val();
                    // if make, year, model, or variant is not selected
                    if(make == 'Select car make' || year == 'Select car year' || model == 'Select car model' || variant == 'Select car variant'){
                        // if alert exists, remove it
                        if($('.alert').length){
                            $('.alert').remove();
                        }
                        $('#price').append('<div class="alert alert-danger mb-0" role="alert">Please select make, year, model, and variant</div>');
                        return;
                    }
                    $.ajax({
                        url: '/api/quote',
                        data: {
                            make,
                            year,
                            model,
                            variant
                        },
                        type: 'GET',
                        success: function(response){
                            // if alert exists, remove it
                            if($('.alert').length){
                                $('.alert').remove();
                            }
                            $('#price').append('<div class="alert alert-success mb-0 ml-auto" role="alert">Price: RM'+response+',000 </div>');
                        }
                    });
                });
            });
        </script>
    </head>
    <body data-bs-theme="dark" class='d-flex justify-content-center align-items-center vh-100'>
        <div class="container-lg border rounded p-3 ml-1 mr-1">
            <h1>Car Quote</h1>
            <form id="car-form">
                <div class="mb-3">
                    <label for="car-make" class="form-label">Make</label>
                    <select class="form-select" aria-label="car make select" id='car-make'>
                        <option selected>Select car make</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="car-year" class="form-label">Year</label>
                    <select disabled class="form-select" aria-label="car year select" id='car-year'>
                        <option selected>Select car year</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="car-model" class="form-label">Model</label>
                    <select disabled class="form-select" aria-label="car model select" id='car-model'>
                        <option selected>Select car model</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="car-variant" class="form-label">Variant</label>
                    <select disabled class="form-select" aria-label="car variant select" id='car-variant'>
                        <option selected>Select car variant</option>
                      </select>
                </div>
                <div id='price' class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary" style="height: 58px;">Get Quote</button>
                    <button id="reset-car-form" class="btn btn-primary bg-danger border-danger" style="height: 58px;">Reset</button>
                </div>
            </form>
        </div>
    </body>
</html>
