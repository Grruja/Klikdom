@extends('layouts.createListing')

@section('pageContent')
    <div class="container">
        <form action="{{ route('listing.create') }}" method="POST" class="sectionMargin" enctype="multipart/form-data">
            {{ csrf_field() }}

            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif

            <fieldset class="bg-white shadow rounded-2 p-4">
                <legend class="fw-bold fs-3">Stan za izdavanje</legend>

                <div class="row g-3">
                    <div class="form-floating">
                        <select name="property_type" required id="propertyType" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="building apartment">Stan u zgradi</option>
                            <option value="house apartment">Stan u kući</option>
                            <option value="apartment">Apartman</option>
                            <option value="studio">Salonac</option>
                            <option value="penthouse">Penthaus</option>
                            <option value="courtyard apartment">Dvorišni stan</option>
                            <option value="duplex">Dupleks</option>
                        </select>
                        <label for="propertyType" class="text-secondary ms-2">Tip stana *</label>
                        <p class="text-danger clientError" id="errorPropertyType"></p>
                    </div>
                    <div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-location-dot" style="color: var(--color-primary)"></i></span>
                            <div class="form-floating">
                                <input type="text" name="location" required id="locationSearch" class="form-control" placeholder="Naziv kraja *">
                                <label for="locationSearch" class="text-secondary ms-2">Naziv kraja *</label>
                            </div>
                        </div>
                        <div class="position-relative">
                            <p class="text-danger clientError" id="errorLocation"></p>
                            <ul id="searchDropdown"
                                style="max-height: 200px; min-height: 30px; overflow: auto; z-index: 3"
                                class="d-none bg-white border border-secondary shadow pb-2 px-3 d-flex flex-column gap-2 position-absolute top-0 w-100">
                            </ul>
                        </div>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <input type="text" name="street" required id="street" class="form-control" placeholder="Ulica *">
                        <label for="street" class="text-secondary ms-2">Ulica *</label>
                        <p class="text-danger clientError" id="errorStreet"></p>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <input type="text" name="property_number" id="propertyNumber" class="form-control" placeholder="Broj">
                        <label for="propertyNumber" class="text-secondary ms-2">Broj</label>
                        <p class="text-danger clientError" id="errorPropertyNumber"></p>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="rooms_number" required id="roomsNumber" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="0.5">Garsonjera</option>
                            <option value="1">Jednosoban stan</option>
                            <option value="1.5">Jednoiposoban stan</option>
                            <option value="2">Dvosoban stan</option>
                            <option value="2.5">Dvoiposoban stan</option>
                            <option value="3">Trosoban stan</option>
                            <option value="3.5">Troiposoban stan</option>
                            <option value="4">Četvorosoban stan</option>
                            <option value="4.5">Četvoroiposoban stan</option>
                            <option value="5">Petosoban stan</option>
                            <option value="5.5">Petoiposoban stan</option>
                            <option value="6">Šestosoban stan</option>
                            <option value="6.5">Šestoiposoban stan</option>
                            <option value="7">Sedmosoban stan</option>
                            <option value="7.5">Sedmoiposoban stan</option>
                            <option value="8">Osmosoban stan</option>
                        </select>
                        <label for="roomsNumber" class="text-secondary ms-2">Broj soba *</label>
                        <p class="text-danger clientError" id="errorRoomsNumber"></p>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="registered" id="registered" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="yes">Uknjižen</option>
                            <option value="no">Nije uknjiženo</option>
                            <option value="in process">U procesu uknjižavanja</option>
                            <option value="partially">Delimično uknjižen</option>
                        </select>
                        <label for="registered" class="text-secondary ms-2">Uknjiženo</label>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="input-group">
                            <div class="form-floating">
                                <input type="number" name="property_area" required id="propertyArea" class="form-control" placeholder="Površina *">
                                <label for="propertyArea" class="text-secondary ms-2">Površina *</label>
                            </div>
                            <span class="input-group-text">&#13217;</span>
                        </div>
                        <p class="text-danger clientError" id="errorPropertyArea"></p>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="condition" id="condition" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="usual">Uobičajeno</option>
                            <option value="new">Novo</option>
                            <option value="under construction">U izgradnji</option>
                            <option value="renovated">Renovirano</option>
                            <option value="needs renovation">Potrebno renoviranje</option>
                            <option value="good condition">Dobro stanje</option>
                            <option value="old">Staro</option>
                            <option value="well maintained">Održavano</option>
                            <option value="luxurious">Luksuzno</option>
                        </select>
                        <label for="condition" class="text-secondary ms-2">Stanje</label>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="heating" required id="heating" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="none">Nema grejanje</option>
                            <option value="central">Centralno</option>
                            <option value="individual">Etažno</option>
                            <option value="electricity">Struja</option>
                            <option value="gas">Gas</option>
                            <option value="tiled stove">Kaljeva peć</option>
                            <option value="electric storage heater">TA peć</option>
                            <option value="norwegian radiators">Norveški radijatori</option>
                            <option value="underfloor">Podno</option>
                            <option value="solid fuel">Čvrsto gorivo</option>
                            <option value="allocators">Alokatori</option>
                            <option value="heat pump">Toplotna pumpa</option>
                            <option value="air conditioning">Klima</option>
                            <option value="marble radiator">Mermerni radijator</option>
                        </select>
                        <label for="heating" class="text-secondary ms-2">Grejanje *</label>
                        <p class="text-danger clientError" id="errorHeating"></p>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="furnishings" id="furnishings" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="empty">Prazno</option>
                            <option value="semi furnished">Polunamešteno</option>
                            <option value="furnished">Namešteno</option>
                        </select>
                        <label for="furnishings" class="text-secondary ms-2">Opremljenost</label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="floor" required id="floor" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="basement">U podrumu</option>
                            <option value="cellar">U suterenu</option>
                            <option value="low ground floor">Na niskom prizemlju</option>
                            <option value="ground floor">Prizemlje</option>
                            <option value="high ground floor">Visoko prizemlje</option>
                            @for ($i = 1; $i < 30; $i++)
                                <option value="{{ $i }}">{{ $i }}. sprat</option>
                            @endfor
                            <option value="attic">Potkrovlje</option>
                        </select>
                        <label for="floor" class="text-secondary ms-2">Sprat *</label>
                        <p class="text-danger clientError" id="errorFloor"></p>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="total_floors" required id="totalFloors" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="1">1 sprat</option>
                            <option value="2">2 sprata</option>
                            <option value="3">3 sprata</option>
                            <option value="4">4 sprata</option>
                            @for ($i = 5; $i < 30; $i++)
                                <option value="{{ $i }}">{{ $i }} spratova</option>
                            @endfor
                        </select>
                        <label for="totalFloors" class="text-secondary ms-2">Ukupno spratova *</label>
                        <p class="text-danger clientError" id="errorTotalFloors"></p>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="elevator" id="elevator" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="0">Nema</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3+</option>
                        </select>
                        <label for="elevator" class="text-secondary ms-2">Lift</label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="internet_type" id="internetType" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="none">Nema</option>
                            <option value="ADSL">ADSL</option>
                            <option value="optical">Optički</option>
                            <option value="cable">Kablovska</option>
                            <option value="satellite">Satelitski</option>
                            <option value="wireless">Bežični</option>
                        </select>
                        <label for="internetType" class="text-secondary ms-2">Tip interneta</label>
                    </div>
                    <div class="form-check col-lg-3 col-md-4 d-flex align-items-center ms-3">
                        <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="air conditioning" id="airConditioning">
                        <label class="form-check-label" for="airConditioning">
                            Klima
                        </label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-lg-3 col-md-4">
                        <div class="form-select" id="suitable">
                            <div class="pe-2 overflow-hidden" style="white-space: nowrap" id="suitableText"></div>
                        </div>
                        <div class="position-relative">
                            <ul class="d-none border bg-white border-secondary shadow py-2 px-3 position-absolute w-100"
                                style="z-index: 3"
                                id="suitableDropdown">
                                <li>
                                    <div class="form-check">
                                        <input type="checkbox" name="suitable[]" class="form-check-input" value="workers" id="workers">
                                        <label class="form-check-label" for="workers">
                                            Radnike
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input type="checkbox" name="suitable[]" class="form-check-input" value="family" id="family">
                                        <label class="form-check-label" for="family">
                                            Porodicu
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input type="checkbox" name="suitable[]" class="form-check-input" value="students" id="students">
                                        <label class="form-check-label" for="students">
                                            Studente
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <label for="suitable" class="text-secondary ms-2">Pogodno za</label>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="smoking_allowed" id="smokingAllowed" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="1">Da</option>
                            <option value="0">Ne</option>
                        </select>
                        <label for="smokingAllowed" class="text-secondary ms-2">Dozvoljeno pušenje</label>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="pets_allowed" id="petsAllowed" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="1">Da</option>
                            <option value="0">Ne</option>
                        </select>
                        <label for="petsAllowed" class="text-secondary ms-2">Dozvoljeni kućni ljubimci</label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-lg-3 col-md-4">
                        <div class="input-group">
                            <div class="form-floating">
                                <input type="number" name="price" required id="price" class="form-control" placeholder="Cena *">
                                <label for="price" class="text-secondary ms-2">Cena *</label>
                            </div>
                            <span class="input-group-text">€</span>
                        </div>
                        <p class="text-danger clientError" id="errorPrice"></p>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-lg-3 col-md-4">
                        <div class="input-group">
                            <div class="form-floating">
                                <input type="number" name="deposit" id="deposit" class="form-control" placeholder="Depozit">
                                <label for="deposit" class="text-secondary ms-2">Depozit</label>
                            </div>
                            <span class="input-group-text">€</span>
                        </div>
                        <p class="text-danger clientError" id="errorDeposit"></p>
                    </div>
                    <div class="form-floating col-lg-3 col-md-4">
                        <select name="payment_schedule" required id="paymentSchedule" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="1">Dan</option>
                            <option value="30">Mesec</option>
                            <option value="90">3 meseca</option>
                            <option value="180">6 meseci</option>
                            <option value="365">Godinu dana</option>
                        </select>
                        <label for="paymentSchedule" class="text-secondary ms-2">Dinamika plaćanja *</label>
                        <p class="text-danger clientError" id="errorPaymentSchedule"></p>
                    </div>
                </div>
            </fieldset>

            <div  class="bg-white shadow rounded-2 p-4 mt-4">
                <fieldset>
                    <legend>Dodatne informacije</legend>

                    <div class="row g-3">
                        <div class="form-floating col-lg-3 col-md-4">
                            <input type="date" name="available_from" id="availableFrom" class="form-control">
                            <label for="availableFrom" class="text-secondary ms-2">Useljivo od</label>
                        </div>
                        <div class="form-check col-lg-3 col-md-4 d-flex align-items-center ms-3">
                            <input type="checkbox" name="available_now" class="form-check-input me-3" value="1" id="availableNow">
                            <label class="form-check-label" for="availableNow">
                                Odmah useljivo
                            </label>
                        </div>
                    </div>

                    <div class="row g-3 mt-1">
                        <div class="form-floating col-lg-3 col-md-4">
                            <select name="infrastructure_name[]" id="loggia" class="form-select">
                                <option value="" disabled selected hidden></option>
                                <option value="no loggia">Nema</option>
                                <option value="loggia 1">1</option>
                                <option value="loggia 2">2</option>
                                <option value="loggia 3+">3+</option>
                            </select>
                            <label for="loggia" class="text-secondary ms-2">Lođa</label>
                        </div>
                        <div class="form-floating col-lg-3 col-md-4">
                            <select name="infrastructure_name[]" id="balcony" class="form-select">
                                <option value="" disabled selected hidden></option>
                                <option value="no balcony">Nema</option>
                                <option value="balcony 1">1</option>
                                <option value="balcony 2">2</option>
                                <option value="balcony 3+">3+</option>
                            </select>
                            <label for="balcony" class="text-secondary ms-2">Terasa</label>
                        </div>
                    </div>

                    <div class="row g-3 mt-1">
                        <div class="form-floating col-lg-3 col-md-4">
                            <select name="room_name[]" id="bathroom" class="form-select">
                                <option value="" disabled selected hidden></option>
                                <option value="no bathroom">Nema</option>
                                <option value="bathroom 1">1</option>
                                <option value="bathroom 2">2</option>
                                <option value="bathroom 3+">3+</option>
                            </select>
                            <label for="bathroom" class="text-secondary ms-2">Kupatilo</label>
                        </div>
                        <div class="form-floating col-lg-3 col-md-4">
                            <select name="room_name[]" id="toilet" class="form-select">
                                <option value="" disabled selected hidden></option>
                                <option value="no toilet">Nema</option>
                                <option value="toilet 1">1</option>
                                <option value="toilet 2">2</option>
                                <option value="toilet 3+">3+</option>
                            </select>
                            <label for="toilet" class="text-secondary ms-2">Toalet</label>
                        </div>
                    </div>

                    <div class="row g-3 mt-1 p-2">
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="room_name[]" class="form-check-input me-3" value="kitchen" id="kitchen">
                            <label class="form-check-label" for="kitchen">
                                Kuhinja
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="room_name[]" class="form-check-input me-3" value="storage" id="storage">
                            <label class="form-check-label" for="storage">
                                Ostava
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="room_name[]" class="form-check-input me-3" value="basement" id="basement">
                            <label class="form-check-label" for="basement">
                                Podrum
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="room_name[]" class="form-check-input me-3" value="loft" id="loft">
                            <label class="form-check-label" for="loft">
                                Tavan
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="business furniture" id="equipment_name1">
                            <label class="form-check-label" for="equipment_name1">
                                Poslovni nameštaj
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="wardrobe" id="equipment_name2">
                            <label class="form-check-label" for="equipment_name2">
                                Plakar
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="built-in wardrobe" id="equipment_name3">
                            <label class="form-check-label" for="equipment_name3">
                                Ugradni plakar
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="american wardrobe" id="equipment_name4">
                            <label class="form-check-label" for="equipment_name4">
                                Američki plakar
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="tv" id="equipment_name5">
                            <label class="form-check-label" for="equipment_name5">
                                TV
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="bed" id="equipment_name6">
                            <label class="form-check-label" for="equipment_name6">
                                Ležaj
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="washing machine" id="equipment_name7">
                            <label class="form-check-label" for="equipment_name7">
                                Veš mašina
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="kitchen units" id="equipment_name8">
                            <label class="form-check-label" for="equipment_name8">
                                Kuhinjski elementi
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="dishwasher" id="equipment_name9">
                            <label class="form-check-label" for="equipment_name9">
                                Sudo mašina
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="refrigerator" id="equipment_name10">
                            <label class="form-check-label" for="equipment_name10">
                                Frižider
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="freezer" id="equipment_name11">
                            <label class="form-check-label" for="equipment_name11">
                                Zamrzivač
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="microwave oven" id="equipment_name12">
                            <label class="form-check-label" for="equipment_name12">
                                Mikrotalasna rerna
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="oven" id="equipment_name13">
                            <label class="form-check-label" for="equipment_name13">
                                Rerna
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="stove" id="equipment_name14">
                            <label class="form-check-label" for="equipment_name14">
                                Šporet
                            </label>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mt-5">
                    <legend>Informacije o objektu</legend>

                    <div class="row g-3 mt-1">
                        <div class="form-floating col-lg-3 col-md-4">
                            <select name="year_built" id="yearBuilt" class="form-select">
                                <option value="" disabled selected hidden></option>
                                <option value="0">Ne znam</option>
                                @for ($i = 1900; $i <= date("Y"); $i+=10)
                                    <option value="{{ $i }}">{{ $i }}.</option>
                                @endfor
                            </select>
                            <label for="yearBuilt" class="text-secondary ms-2">Godina izgradnje</label>
                        </div>
                        <div class="form-floating col-lg-3 col-md-4">
                            <div class="form-select" id="parkingType">
                                <div class="pe-2 overflow-hidden" style="white-space: nowrap" id="parkingTypeText"></div>
                            </div>
                            <div class="position-relative">
                                <ul class="d-none border bg-white border-secondary shadow py-2 px-3 position-absolute w-100"
                                    style="z-index: 3"
                                    id="parkingTypeDropdown">
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" name="parking[]" class="form-check-input" value="public out of zone" id="parking1">
                                            <label class="form-check-label" for="parking1">
                                                Javni parking van zone
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" name="parking[]" class="form-check-input" value="public in the zone" id="parking2">
                                            <label class="form-check-label" for="parking2">
                                                Javni parking u zoni
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" name="parking[]" class="form-check-input" value="in the building courtyard" id="parking3">
                                            <label class="form-check-label" for="parking3">
                                                Parking u dvorištu zgrade
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" name="garage[]" class="form-check-input" value="within the facility" id="garage1">
                                            <label class="form-check-label" for="garage1">
                                                Garaža u sklopu objekta
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" name="garage[]" class="form-check-input" value="public" id="garage2">
                                            <label class="form-check-label" for="garage2">
                                                Javna garaža
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <label for="parkingType" class="text-secondary ms-2">Parking i garaža</label>
                        </div>
                        <div class="form-floating col-lg-3 col-md-4">
                            <input type="number" name="garage_space" id="garageSpace" class="form-control" placeholder="Broj mesta u garaži">
                            <label for="garageSpace" class="text-secondary ms-2">Broj mesta u garaži</label>
                            <p class="text-danger clientError" id="errorGarageSpace"></p>
                        </div>
                    </div>

                    <div class="row g-3 mt-1 p-2">
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="telephone line" id="equipment_name15">
                            <label class="form-check-label" for="equipment_name15">
                                Telefonska linija
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="equipment_name[]" class="form-check-input me-3" value="cable" id="equipment_name16">
                            <label class="form-check-label" for="equipment_name16">
                                Kablovska
                            </label>
                        </div>
                    </div>

                    <div class="row g-3 mt-1">
                        <div class="form-floating col-lg-3 col-md-4">
                            <div class="form-select" id="view">
                                <div class="pe-2 overflow-hidden" style="white-space: nowrap" id="viewText"></div>
                            </div>
                            <div class="position-relative">
                                <ul class="d-none border bg-white border-secondary shadow py-2 px-3 position-absolute w-100"
                                    style="z-index: 3"
                                    id="viewDropdown">
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" name="view[]" class="form-check-input" value="street" id="streetView">
                                            <label class="form-check-label" for="streetView">
                                                Pogled ka ulici
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" name="view[]" class="form-check-input" value="courtyard" id="yardView">
                                            <label class="form-check-label" for="yardView">
                                                Pogled ka dvorištu
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <label for="view" class="text-secondary ms-2">Orijentacija - Pogled</label>
                        </div>
                    </div>

                    <div class="row g-3 mt-1 p-2">
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="disabled access" id="invalids">
                            <label class="form-check-label" for="invalids">
                                Prilaz za invalide
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="courtyard" id="yard">
                            <label class="form-check-label" for="yard">
                                Dvorište
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="sauna" id="sauna">
                            <label class="form-check-label" for="sauna">
                                Sauna
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="fitness" id="fitness">
                            <label class="form-check-label" for="fitness">
                                Fitness
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="ventilation" id="ventilation">
                            <label class="form-check-label" for="ventilation">
                                Ventilacija
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="central air conditioning" id="centralAc">
                            <label class="form-check-label" for="centralAc">
                                Centralna klima
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="surveillance camera" id="surveillance">
                            <label class="form-check-label" for="surveillance">
                                Video nadzor
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="alarm" id="alarm">
                            <label class="form-check-label" for="alarm">
                                Alarm
                            </label>
                        </div>
                        <div class="form-check col-lg-3 col-sm-4 d-flex align-items-center">
                            <input type="checkbox" name="infrastructure_name[]" class="form-check-input me-3" value="reception" id="reception">
                            <label class="form-check-label" for="reception">
                                Recepcija
                            </label>
                        </div>
                    </div>
                </fieldset>
            </div>

            <fieldset class="bg-white shadow rounded-2 p-4 mt-4">
                <legend class="mb-4">Opis</legend>

                <div class="form-floating">
                    <textarea name="description" id="description" class="form-control" placeholder="Opis oglasa..." style="height: 150px;"></textarea>
                    <label class="text-secondary ms-2" for="description">
                        Opis oglasa...
                    </label>
                    <p class="text-danger clientError" id="errorDescription"></p>
                </div>
            </fieldset>

            <fieldset class="bg-white shadow rounded-2 p-4 mt-4">
                <div class="mb-4">
                    <legend>Slike</legend>
                    <p>Kvalitetne slike privlače pažnju potencijalnih kupaca, dok one loše napravljene imaju suprotan efekat, odvraćajući ih. Potrudi se da slike budu visoke rezolucije kako bi kupcima pružio celovit uvid u sve prostorije, dvorište, i terasu. Sredi svaku prostoriju pre nego što je fotografišeš, zabeleži je iz različitih uglova, osiguraj dobro osvetljenje i stvori dojam najboljeg mogućeg stanja.</p>
                </div>

                <div class="d-flex flex-column align-items-center">
                    <output class="py-5 d-flex flex-wrap gap-4 justify-content-center" id="imagesContainer">
                        <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 70px; color: #9ca3af"></i>
                    </output>
                    <label for="inputImages" class="btnPrimary pointer">
                        <input type="file" name="images[]" id="inputImages" data-max-file-size="2M" multiple accept="image/jpeg, image/png, image/jpg" hidden/>
                        <i class="fa-solid fa-plus me-2"></i>
                        Unesi fotografiju
                    </label>
                    <p class="text-secondary fw-bold mt-3" style="font-size: 13px">PNG, JPG ili JPEG do 5MB</p>
                    <p class="text-danger clientError mt-3" id="errorImages"></p>
                </div>
            </fieldset>

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
