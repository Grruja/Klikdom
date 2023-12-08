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
