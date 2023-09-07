@extends('layouts.main')

@section('pageContent')
    <div class="container d-flex justify-content-center">
        <form action="{{ route('listing.create') }}" method="GET" class="py-4 px-sm-5 px-4 rounded-2 shadow bg-white sectionMargin" style="width: fit-content">
            <div class="d-flex flex-md-row flex-column">
                <div style="margin-right: 6rem" class="mb-md-0 mb-5">
                    <h2 class="fs-5 mb-4">Izaberite transakciju:</h2>
                    <input type="radio" name="transaction" id="sell" value="sell" class="mb-3" required>
                    <lable for="sell">PRODAJA</lable>
                    <br>
                    <input type="radio" name="transaction" id="rent" value="rent" required>
                    <lable for="rent">IZDAVANJE</lable>
                </div>

                <div>
                    <h2 class="fs-5 mb-4">Izaberite tip nekretnine:</h2>
                    <input type="radio" name="real_estate" id="house" value="house" class="mb-3" required>
                    <lable for="house">KUĆA</lable>
                    <br>
                    <input type="radio" name="real_estate" id="apartment" value="apartment" required>
                    <lable for="apartment">STAN</lable>
                </div>
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
