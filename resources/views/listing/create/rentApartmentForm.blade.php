@extends('layouts.createListing')

@section('pageContent')
    <div class="container">
        <form action="" method="POST" class="sectionMargin">
            <fieldset class="bg-white shadow rounded-2 p-4">
                <legend class="fw-semibold">Stan za izdavanje</legend>
                <input type="hidden" name="transaction" value="izdavanje">
                <input type="hidden" name="property" value="stan">

                <div class="row g-3">
                    <div class="form-floating">
                        <select name="type" required id="type" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="uknjiženo">Stan u zgradi</option>
                            <option value="nije uknjiženo">Stan u kući</option>
                            <option value="u procesu uknjižavanja">Apartman</option>
                            <option value="delimično uknjižen">Salonac</option>
                            <option value="delimično uknjižen">Penthaus</option>
                            <option value="delimično uknjižen">Dvorišni stan</option>
                            <option value="delimično uknjižen">Dupleks</option>
                        </select>
                        <label for="type" class="text-secondary ms-2">Tip stana *</label>
                    </div>
                    <div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-location-dot" style="color: var(--color-primary)"></i></span>
                            <div class="form-floating">
                                <input type="text" name="location" required id="locationSearch" class="form-control" placeholder="Naziv kraja*">
                                <label for="locationSearch" class="text-secondary ms-2">Naziv kraja*</label>
                            </div>
                        </div>
                        <ul id="searchDropdown"
                            style="max-height: 200px; min-height: 30px; overflow: auto; z-index: 3"
                            class="d-none bg-white border border-secondary shadow py-2 px-3 d-flex flex-column gap-2 position-absolute">
                        </ul>
                    </div>
                    <div class="form-floating col-3">
                        <input type="text" name="street" required id="street" class="form-control" placeholder="Ulica*">
                        <label for="street" class="text-secondary ms-2">Ulica *</label>
                    </div>
                    <div class="form-floating col-3">
                        <input type="text" name="property_number" id="propertyNumber" class="form-control" placeholder="Broj">
                        <label for="propertyNumber" class="text-secondary ms-2">Broj</label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-3">
                        <select name="rooms" required id="rooms" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="garsonjera">Garsonjera</option>
                            <option value="1 soba">Jednosoban stan</option>
                            <option value="1.5 soba">Jednoiposoban stan</option>
                            <option value="2 sobe">Dvosoban stan</option>
                            <option value="2.5 sobe">Dvoiposoban stan</option>
                            <option value="3 sobe">Trosoban stan</option>
                            <option value="3.5 sobe">Troiposoban stan</option>
                            <option value="4 sobe">Četvorosoban stan</option>
                            <option value="4.5 sobe">Četvoroiposoban stan</option>
                            <option value="5 soba">Petosoban stan</option>
                            <option value="5.5 soba">Petoiposoban stan</option>
                            <option value="6 soba">Šestosoban stan</option>
                            <option value="6.5 soba">Šestoiposoban stan</option>
                            <option value="7 soba">Sedmosoban stan</option>
                            <option value="7.5 soba">Sedmoiposoban stan</option>
                            <option value="8 soba">Osmosoban stan</option>
                        </select>
                        <label for="rooms" class="text-secondary ms-2">Broj soba *</label>
                    </div>
                    <div class="form-floating col-3">
                        <select name="registered" id="registered" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="uknjiženo">Uknjižen</option>
                            <option value="nije uknjiženo">Nije uknjiženo</option>
                            <option value="u procesu uknjižavanja">U procesu uknjižavanja</option>
                            <option value="delimično uknjižen">Delimično uknjižen</option>
                        </select>
                        <label for="registered" class="text-secondary ms-2">Uknjiženo</label>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <div class="form-floating">
                                <input type="number" name="property_area" required id="propertyArea" class="form-control" placeholder="Površina*">
                                <label for="propertyArea" class="text-secondary ms-2">Površina *</label>
                            </div>
                            <span class="input-group-text">&#13217;</span>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-3">
                        <select name="condition" id="condition" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="uobičajeno">Uobičajeno</option>
                            <option value="novo">Novo</option>
                            <option value="u izgradnji">U izgradnji</option>
                            <option value="renovirano">Renovirano</option>
                            <option value="potrebno renoviranje">Potrebno renoviranje</option>
                            <option value="dobro stanje">Dobro stanje</option>
                            <option value="staro">Staro</option>
                            <option value="održavano">Održavano</option>
                            <option value="luksuzno">Luksuzno</option>
                        </select>
                        <label for="condition" class="text-secondary ms-2">Stanje</label>
                    </div>
                    <div class="form-floating col-3">
                        <select name="heating" required id="heating" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="nema grejanje">Nema grejanje</option>
                            <option value="centralno">Centralno</option>
                            <option value="etažno">Etažno</option>
                            <option value="struja">Struja</option>
                            <option value="gas">Gas</option>
                            <option value="kaljeva peć">Kaljeva peć</option>
                            <option value="TA peć">TA peć</option>
                            <option value="norveški radijatori">Norveški radijatori</option>
                            <option value="podno">Podno</option>
                            <option value="čvrsto gorivo">Čvrsto gorivo</option>
                            <option value="alokatori">Alokatori</option>
                            <option value="toplotna pumpa">Toplotna pumpa</option>
                            <option value="klima">Klima</option>
                            <option value="mermerni radijator">Mermerni radijator</option>
                        </select>
                        <label for="heating" class="text-secondary ms-2">Grejanje *</label>
                    </div>
                    <div class="form-floating col-3">
                        <select name="furnishings" id="furnishings" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="prazno">Prazno</option>
                            <option value="polunamešteno">Polunamešteno</option>
                            <option value="namešteno">Namešteno</option>
                        </select>
                        <label for="furnishings" class="text-secondary ms-2">Opremljenost</label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-3">
                        <select name="floor" required id="floor" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="u podrumu">U podrumu</option>
                            <option value="u suterenu">U suterenu</option>
                            <option value="na niskom prizemlju">Na niskom prizemlju</option>
                            <option value="prizemlje">Prizemlje</option>
                            <option value="visoko prizemlje">Visoko prizemlje</option>
                            @for ($i = 1; $i < 30; $i++)
                                <option value="{{ $i }}. sprat">{{ $i }}. sprat</option>
                            @endfor
                            <option value="potkrovlje">Potkrovlje</option>
                        </select>
                        <label for="floor" class="text-secondary ms-2">Sprat *</label>
                    </div>
                    <div class="form-floating col-3">
                        <select name="total_floors" required id="total_floors" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="1 sprat">1 sprat</option>
                            <option value="2 sprata">2 sprata</option>
                            <option value="3 sprata">3 sprata</option>
                            <option value="4 sprata">4 sprata</option>
                            @for ($i = 5; $i < 30; $i++)
                                <option value="{{ $i }} spratova">{{ $i }} spratova</option>
                            @endfor
                        </select>
                        <label for="total_floors" class="text-secondary ms-2">Ukupno spratova *</label>
                    </div>
                    <div class="form-floating col-3">
                        <select name="elevator" id="elevator" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="nema">Nema</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3+">3+</option>
                        </select>
                        <label for="elevator" class="text-secondary ms-2">Lift</label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-3">
                        <select name="internet_type" id="internet_type" class="form-select">
                            <option value="" disabled selected hidden></option>
                            <option value="nema">Nema</option>
                            <option value="ADSL">ADSL</option>
                            <option value="optički">Optički</option>
                            <option value="kablovska">Kablovska</option>
                            <option value="satelitski">Satelitski</option>
                            <option value="bežični">Bežični</option>
                        </select>
                        <label for="internet_type" class="text-secondary ms-2">Tip interneta</label>
                    </div>
                    <div class="form-check col-3 d-flex align-items-center ms-3">
                        <input type="checkbox" name="name" class="form-check-input me-3" value="klima" id="air_conditioning">
                        <label class="form-check-label" for="air_conditioning">
                            Klima
                        </label>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="form-floating col-3">
                        <div class="form-select" id="suitable">
                            <div class="pe-2 overflow-hidden" style="white-space: nowrap" id="suitableText"></div>
                        </div>
                        <ul class="d-none border bg-white border-secondary shadow py-2 px-3 position-absolute" id="suitableDropdown">
                            <li>
                                <div class="form-check">
                                    <input type="checkbox" name="suitable[]" class="form-check-input me-md-3" value="Radnike" id="workers">
                                    <label class="form-check-label" for="workers">
                                        Radnike
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input type="checkbox" name="suitable[]" class="form-check-input me-md-3" value="Porodicu" id="family">
                                    <label class="form-check-label" for="family">
                                        Porodicu
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input type="checkbox" name="suitable[]" class="form-check-input me-md-3" value="Studente" id="students">
                                    <label class="form-check-label" for="students">
                                        Studente
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <label for="suitable" class="text-secondary ms-2">Pogodno za</label>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
