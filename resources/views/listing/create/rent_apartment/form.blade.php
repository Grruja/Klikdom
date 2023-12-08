@extends('layouts.listingForm')

@section('pageContent')
    <div class="container">
        <form action="{{ route('listing.create') }}" method="POST" class="sectionMargin" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('listing.create.rent_apartment.info')

            <div  class="bg-white shadow rounded-2 p-4 mt-4">
                @include('listing.create.rent_apartment.details')
                @include('listing.create.rent_apartment.propertyInfo')
            </div>

            @include('listing.create.rent_apartment.additional')

            <div class="bg-white shadow rounded-top-2 p-4 mt-4 d-flex flex-md-row flex-column-reverse gap-md-0 gap-3 justify-content-between">
                <a href="/" class="btn btn-outline-danger fw-semibold py-3 px-4">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                    Odustani
                </a>

                <button class="btn btn-success fw-semibold py-3 px-4" id="submitListing">
                    <i class="fa-solid fa-check me-2"></i>
                    Postavi oglas
                </button>
            </div>
        </form>
    </div>
@endsection
