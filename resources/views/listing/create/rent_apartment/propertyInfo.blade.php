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
