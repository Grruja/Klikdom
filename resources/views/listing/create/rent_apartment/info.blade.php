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
                    <input type="hidden" name="location_id" id="locationId">
                    <input type="text" required id="locationSearch" class="form-control" placeholder="Naziv kraja *" autocomplete="off">
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
