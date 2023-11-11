// ===== OFFCANVAS OPEN & CLOSE
const myOffcanvas = document.getElementById('offcanvasNavbar');
const bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

document.getElementById("openMenu").addEventListener('click', (e) => {
    e.preventDefault();
    bsOffcanvas.toggle();
});


// ===== LOADING SPINNER
function loadingSpinner(status, spinnerId, parentId) {
    if (status) {
        const parent = document.getElementById(parentId);
        parent.innerHTML = '';
        const div = document.createElement('div');
        div.id = spinnerId;
        div.innerHTML = `<div class="spinner-border" style="color: var(--color-primary)" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>`
        parent.appendChild(div);
    }
    else {
        document.getElementById(spinnerId).remove();
    }
}


// ===== LOCATION
let firstErrorElement = null;   //used in location and validation for other fields

const locationSearch = document.getElementById('locationSearch');
const searchDropdown = document.getElementById('searchDropdown');
const errorLocation = document.getElementById('errorLocation');

selectLocation();

/* functions */
function selectLocation() {
    let timer;
    const waitTime = 1500;
    locationSearch.addEventListener('input', () => {
        clearTimeout(timer);

        timer = setTimeout(function() {
            if (locationSearch.value.trim().length > 2) {
                deleteLocations();
                displayLocationsDropdown();
            }
            else {
                searchDropdown.classList.add('d-none');
            }
            errorMessageLocation(true);
        }, waitTime);
    });
}

function displayLocationsDropdown() {
    const searchValue = locationSearch.value.trim();

    getLocations(searchValue)
        .then(locations => {
            if (locations.length > 0) {
                displayLocations(locations);
                searchDropdown.classList.remove('d-none');
            }
            else {
                searchDropdown.classList.remove('d-none');
                searchDropdown.innerHTML = `<div class="d-flex flex-column align-items-center my-4">
                                                <i class="fa-solid fa-magnifying-glass fs-1 mb-2"></i>
                                                <p class="fw-semibold text-secondary">Kraj pod imenom "${searchValue}" nije pronađen.</p>
                                            </div>`;
            }
        })
        .catch(error => {
            throw error;
        });

    blurLocationsDropdown(searchDropdown, locationSearch);
}

async function getLocations(location) {
    try {
        const response = await fetch(`https://api.4zida.rs/v6/autocomplete?q=${location.toLowerCase()}`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        return await response.json();
    }
    catch (error) {
        throw error;
    }
}

function displayLocations(locations) {
    locations.forEach((location) => {
        if (location.allParentTitles.length < 1) return;

        const locationLength = location.allParentTitles.length;
        if (locationLength > 1) {
            let li = document.createElement('li');
            li.className = 'pointer border-top pt-2';
            locationIcon(li);
            pickLocation(li);

            for (let j = locationLength - 1; j >= -1; j--) {
                let span = document.createElement('span');

                span.textContent =  (j < 0) ? `${location.title}` : `${location.allParentTitles[j]} - `;
                li.appendChild(span);
            }
            searchDropdown.appendChild(li);
        }
    });
}

function blurLocationsDropdown() {
    locationSearch.addEventListener('blur', () => {
        setTimeout(() => {
            searchDropdown.classList.add('d-none');
            deleteLocations();
        }, 200);
    });
}

function deleteLocations() {
    while (searchDropdown.firstChild) {
        searchDropdown.removeChild(searchDropdown.firstChild);
    }
}

function pickLocation(element) {
    element.addEventListener('click', () => {
        locationSearch.value = element.textContent;
        errorMessageLocation(false);
    });
}

function locationIcon(parentElement) {
    const icon = document.createElement('i');
    icon.className = 'fa-solid fa-location-dot me-3';
    icon.style.color = 'var(--color-primary)';
    parentElement.appendChild(icon);
}

function errorMessageLocation(error) {
    if (error) {
        errorLocation.textContent = 'Polje kraj je obavezno.';
        locationSearch.classList.add('is-invalid');
        setScrollOnError(locationSearch);
    }
    else {
        errorLocation.textContent = '';
        locationSearch.classList.remove('is-invalid');
    }
}

function validationLocation() {
    if (errorLocation.textContent) {
        return false;
    }
    else if (locationSearch.value.trim() === '') {
        errorMessageLocation(true);
        return false;
    }
    else return true;
}


// ===== CHECKBOX DROPDOWN
dropdownCheckboxes('suitable', 'suitableText', 'suitableDropdown');
dropdownCheckboxes('parkingType', 'parkingTypeText', 'parkingTypeDropdown');
dropdownCheckboxes('view', 'viewText', 'viewDropdown');

/* functions */
function dropdownCheckboxes(btnId, textId, dropdownId) {
    const btn = document.getElementById(btnId);
    if (!btn) return;

    const text = document.getElementById(textId);
    const dropdown = document.getElementById(dropdownId);
    const checkboxes = dropdown.querySelectorAll('.form-check-input');

    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        dropdown.classList.toggle('d-none');
    });

    document.addEventListener('click', (event) => {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.add('d-none');
        }
    });

    displayCheckboxValue(text, checkboxes);
}

function displayCheckboxValue(text, checkboxes) {
    const boxesChecked = [];
    checkboxes.forEach((box) => {
        box.addEventListener('change', () => {
            if (box.checked) {
                const span = document.createElement('span');
                span.textContent = (boxesChecked.length < 1) ? `${box.value}` : `, ${box.value}`;
                text.appendChild(span);
                boxesChecked.push(span);
            }
            else {
                const index = boxesChecked.findIndex((span) => span.textContent.includes(box.value));
                if (index !== -1) {
                    boxesChecked[index].remove();
                    boxesChecked.splice(index, 1);
                }
            }
        });
    });
}


// ===== DATE PICKER & CHECKBOX
disableAvailableFrom();

/* functions */
function disableAvailableFrom() {
    const date = document.getElementById('availableFrom');
    if (!date) return;
    const checkbox = document.getElementById('availableNow');

    date.addEventListener('change', () => {
        if (date.value.trim()) {
            checkbox.setAttribute('disabled', '');
        }
        else checkbox.removeAttribute('disabled');
    });

    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            date.setAttribute('disabled', '');
        }
        else date.removeAttribute('disabled');
    });
}


// ===== IMAGE UPLOAD PREVIEW
const images = document.getElementById('inputImages');
const imagesContainer = document.getElementById('imagesContainer');
const imagesArray = [];

images.addEventListener('change', () => {
    const files = images.files;

    for (let i = 0; i < files.length; i++) {
        imagesArray.push(files[i]);
    }
    displayImages();
});

/* functions */
function displayImages() {
    let images = '';
    loadingSpinner(true, 'imageSpinner', 'imagesContainer');

    imagesArray.forEach((image, index) => {
        images += `<div style="width: 250px; height: 250px" class="p-3 rounded-2 border">
                    <img src="${URL.createObjectURL(image)}" alt="Property" class="w-100 h-100" style="object-fit: contain">
                  </div>`
    });
    imagesContainer.innerHTML = images;
}


// ===== VALIDATION
const fields = [
    { input: 'type', text: 'tip nekretnine', error: 'errorType', required: true, },
    { input: 'street', text: 'ulica', error: 'errorStreet', minLength: 3, required: true, },
    { input: 'propertyNumber', text: 'broj', error: 'errorPropertyNumber', minLength: 1, required: false, },
    { input: 'roomsNumber', text: 'broj soba', error: 'errorRoomsNumber', required: true, },
    { input: 'propertyArea', text: 'površina', error: 'errorPropertyArea', regex: /^[1-9]\d*(\.\d+)?$/, minLength: 1, required: true, },
    { input: 'heating', text: 'grejanje', error: 'errorHeating', required: true, },
    { input: 'floor', text: 'sprat', error: 'errorFloor', required: true, },
    { input: 'totalFloors', text: 'ukupno spratova', error: 'errorTotalFloors', required: true, },
    { input: 'price', text: 'cena', error: 'errorPrice', regex: /^(?:0|[1-9]\d*)(?:\.\d+)?$/, required: true, },
    { input: 'deposit', text: 'depozit', error: 'errorDeposit', regex: /^(?:0|[1-9]\d*)(?:\.\d+)?$/, required: false, },
    { input: 'paymentSchedule', text: 'dinamika plaćanja', error: 'errorPaymentSchedule', required: true, },
    { input: 'garageSpace', text: 'broj mesta u garaži', error: 'errorGarageSpace', regex: /^[1-9]\d*(\.\d+)?$/, required: false, },
    { input: 'description', text: 'opis', error: 'errorDescription', minLength: 5, required: false, },
];

addEventListener();
submitListing();

/* functions */
function addEventListener() {
    fields.forEach((field) => {
        const inputElement = document.getElementById(field.input);
        inputElement.addEventListener('input', () => validateField(field));
    });
}

function validateField(field) {
    let isValid = false;

    const inputElement = document.getElementById(field.input);
    const errorElement = document.getElementById(field.error);
    const inputValue = inputElement.value.trim();

    if (field.required && inputValue === '' || field.required && inputValue === '') {
        errorElement.textContent = `Polje ${field.text} je obavezno.`;
    }
    else if (field.regex && !field.regex.test(inputValue) && inputValue.length > 0) {
        errorElement.textContent = `Polje ${field.text} je uneto u nepravilnom formatu.`;
    }
    else if (inputValue.length > 0 && inputValue.length < field.minLength) {
        errorElement.textContent = `Polje ${field.text} mora sadržati barem ${field.minLength} karaktera.`;
    }
    else {
        errorElement.textContent = '';
        isValid = true;
    }

    if (errorElement.textContent) {
        inputElement.classList.add('is-invalid');
        setScrollOnError(inputElement);
    }
    else {
        inputElement.classList.remove('is-invalid');
    }

    return isValid;
}

function submitListing() {
    const btn = document.getElementById('submitListing');
    btn.addEventListener('click', e => {
        let canSubmit = true;
        btn.innerHTML = `<i class="fa-solid fa-circle-notch fa-spin me-2"></i>Postavi oglas`;

        canSubmit = validationLocation();

        firstErrorElement = null;
        fields.forEach((field) => {
            if (!validateField(field)) {
                canSubmit = false;
            }
        });

        if (!canSubmit) {
            e.preventDefault();
            scrollOnError();
            btn.innerHTML = `<i class="fa-solid fa-check me-2"></i>Postavi oglas`;
        }
    });
}

function scrollOnError() {
    if (firstErrorElement) {
        firstErrorElement.scrollIntoView({ behavior: 'smooth' });
    }
}

function setScrollOnError(input) {
    if (!firstErrorElement) {
        return firstErrorElement = input;
    }
}
