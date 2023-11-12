@extends('layouts.createListing')

@section('pageContent')
    <div class="container d-flex justify-content-center">
        <form action="{{ route('listing.form') }}" method="GET" class="p-sm-5 p-4 rounded-2 shadow bg-white sectionMargin" style="width: fit-content">
            <div class="d-flex flex-md-row flex-column">
                <fieldset style="margin-right: 6rem" class="mb-md-0 mb-5">
                    <legend class="fs-5 mb-4 fw-semibold">Izaberite transakciju:</legend>
                    <input type="radio" name="transaction" id="sell" value="prodaja" class="mb-3" required>
                    <lable for="sell">PRODAJA</lable>
                    <br>
                    <input type="radio" name="transaction" id="rent" value="izdavanje" required>
                    <lable for="rent">IZDAVANJE</lable>
                </fieldset>

                <fieldset>
                    <legend class="fs-5 mb-4 fw-semibold">Izaberite tip nekretnine:</legend>
                    <input type="radio" name="property" id="house" value="kuća" class="mb-3" required>
                    <lable for="house">KUĆA</lable>
                    <br>
                    <input type="radio" name="property" id="apartment" value="stan" required>
                    <lable for="apartment">STAN</lable>
                </fieldset>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <button class="btnPrimary">Nastavi <i class="fa-solid fa-chevron-right ms-2"></i></button>
            </div>
        </form>

        <style>
            main {
                background-image: url("{{ asset('assets/white_house.jpg') }}");
                background-size: cover;
                background-position: bottom;
                background-repeat: no-repeat;
            }
        </style>
    </div>
@endsection
