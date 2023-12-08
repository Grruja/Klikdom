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
