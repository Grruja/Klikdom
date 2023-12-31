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


// ===== SCROLL TO ERROR MESSAGE
let firstErrorElement = null;

function scrollOnError() {
    if (firstErrorElement) {
        firstErrorElement.scrollIntoView({ behavior: 'smooth' });
    }
}

function setScrollOnError(input) {
    if (firstErrorElement === null) {
        return firstErrorElement = input;
    }
}


// ===== LOCATION INPUT
const locationId = document.getElementById('locationId');
const locationSearch = document.getElementById('locationSearch');
const searchDropdown = document.getElementById('searchDropdown');
const errorLocation = document.getElementById('errorLocation');

let locationTimer;
const waitLocationTime = 1500;
locationSearch.addEventListener('input', () => {
    clearTimeout(locationTimer);

    locationTimer = setTimeout(function() {
        if (locationSearch.value.trim().length > 2) {
            deleteLocations();
            displayLocationsDropdown();
        }
        else {
            searchDropdown.classList.add('d-none');
        }
        locationErrorMessage(true);
    }, waitLocationTime);
});

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
                                                <i class="fa-solid fa-magnifying-glass fs-1 mb-2" style="color: var(--color-primary)"></i>
                                                <p class="fw-semibold text-secondary text-center">Kraj pod imenom "${searchValue}" nije pronađen.</p>
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
        const response = await fetch(`/locations/${location.toLowerCase()}`);
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
        const li = document.createElement('li');
        li.className = 'pointer border-top pt-2';
        li.value = location.id;
        locationIcon(li);
        pickLocation(li);

        const span = document.createElement('span');
        span.textContent = location.search_title;
        li.appendChild(span);

        searchDropdown.appendChild(li);
    })
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
        locationId.value = element.value
        locationSearch.value = element.textContent;
        locationErrorMessage(false);
    });
}

function locationIcon(parentElement) {
    const icon = document.createElement('i');
    icon.className = 'fa-solid fa-location-dot me-3';
    icon.style.color = 'var(--color-primary)';
    parentElement.appendChild(icon);
}


// ===== CHECKBOX DROPDOWN
dropdownCheckboxes('suitable', 'suitableText', 'suitableDropdown');
dropdownCheckboxes('parkingType', 'parkingTypeText', 'parkingTypeDropdown');
dropdownCheckboxes('view', 'viewText', 'viewDropdown');

function dropdownCheckboxes(btnId, textId, dropdownId) {
    const btn = document.getElementById(btnId);
    if (btn === null) return;

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
            const label = box.nextElementSibling;

            if (box.checked) {
                const span = document.createElement('span');
                span.textContent = (boxesChecked.length < 1) ? `${label.textContent}` : `, ${label.textContent}`;
                text.appendChild(span);
                boxesChecked.push(span);
            }
            else {
                const index = boxesChecked.findIndex((span) => span.textContent.includes(label.textContent));
                if (index !== -1) {
                    boxesChecked[index].remove();
                    boxesChecked.splice(index, 1);
                }
            }
        });
    });
}


// ===== DISABLE DATE PICKER OR CHECKBOX
const dateAvailable = document.getElementById('availableFrom');
const availableNow = document.getElementById('availableNow');

dateAvailable.addEventListener('change', () => {
    if (dateAvailable.value.trim()) {
        availableNow.setAttribute('disabled', '');
    }
    else availableNow.removeAttribute('disabled');
});

availableNow.addEventListener('change', () => {
    if (availableNow.checked) {
        dateAvailable.setAttribute('disabled', '');
    }
    else dateAvailable.removeAttribute('disabled');
});


// ===== IMAGE UPLOAD PREVIEW
const images = document.getElementById('inputImages');
const imagesContainer = document.getElementById('imagesContainer');
const imageSize = 5120;
const errorImages = document.getElementById('errorImages');
let imagesArray = [];

images.addEventListener('change', () => {
    const files = images.files;

    for (let i = 0; i < files.length; i++) {
        if (validateImages(files[i])) {
            imagesArray.push(files[i]);
            displayImages();
        }
        else {
            images.value = '';
            imagesArray = [];
            imagesContainer.innerHTML = `<i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 70px; color: #9ca3af"></i>`;
            firstErrorElement = null;
            setScrollOnError(images);
        }
    }
});

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


/**
 *
 * Listing form validations
 *
 */

// ===== VALIDATION FOR ALL FIELDS
const fields = [
    [
        { input: 'propertyType', text: 'tip nekretnine', error: 'errorPropertyType', required: true, },
        { input: 'street', text: 'ulica', error: 'errorStreet', minLength: 3, maxLength: 255, required: true, },
        { input: 'propertyNumber', text: 'broj', error: 'errorPropertyNumber', minLength: 1, maxLength: 30, required: false, },
        { input: 'roomsNumber', text: 'broj soba', error: 'errorRoomsNumber', required: true, },
        { input: 'propertyArea', text: 'površina', error: 'errorPropertyArea', regex: /^[1-9]\d*$/, required: true, },
        { input: 'heating', text: 'grejanje', error: 'errorHeating', required: true, },
        { input: 'price', text: 'cena', error: 'errorPrice', regex: /^[1-9]\d*$/, required: true, },
        { input: 'deposit', text: 'depozit', error: 'errorDeposit', regex: /^[1-9]\d*$/, required: false, },
        { input: 'paymentSchedule', text: 'dinamika plaćanja', error: 'errorPaymentSchedule', required: true, },
        { input: 'garageSpace', text: 'broj mesta u garaži', error: 'errorGarageSpace', regex: /^[1-9]\d*$/, required: false, },
        { input: 'description', text: 'opis', error: 'errorDescription', minLength: 5, required: false, },
    ],
    [
        { input: 'floor', required: true, },
        { input: 'totalFloors', required: true, },
    ],
    [
        { input: 'locationSearch', required: true, },
        { input: 'inputImages', required: false, },
    ],
];

fields[0].forEach(field => {
    const inputElement = document.getElementById(field.input);
    inputElement.addEventListener('input', () => validateField(field));
});

function validateField(field) {
    const inputElement = document.getElementById(field.input);
    const errorElement = document.getElementById(field.error);
    const inputValue = inputElement.value.trim();

    if (field.required && inputValue === '' || field.required && inputValue === '') {
        errorElement.textContent = `Polje ${field.text} je obavezno.`;
    }
    else if (field.regex && !field.regex.test(inputValue) && inputValue.length > 0) {
        errorElement.textContent = `Polje ${field.text} je uneto u nepravilnom formatu.`;
    }
    else if (inputValue.length > 0 && inputValue.length < field.minLength || inputValue.length > field.maxLength) {
        errorElement.textContent = `Polje ${field.text} mora sadržati minimalno ${field.minLength} do ${field.maxLength} karaktera.`;
    }
    else {
        errorElement.textContent = '';
    }

    if (errorElement.textContent) {
        inputElement.classList.add('is-invalid');
        firstErrorElement = null;
        setScrollOnError(inputElement);
    }
    else {
        inputElement.classList.remove('is-invalid');
    }
}

// ===== LOCATION VALIDATION
function locationErrorMessage(error) {
    if (error) {
        errorLocation.textContent = 'Polje kraj je obavezno.';
        locationSearch.classList.add('is-invalid');
        locationId.value = '';
        setScrollOnError(locationSearch);
    }
    else {
        errorLocation.textContent = '';
        locationSearch.classList.remove('is-invalid');
    }
}

// ===== FLOOR & TOTAL FLOORS VALIDATION
const floor = document.getElementById('floor');
const totalFloors = document.getElementById('totalFloors');

if (floor && totalFloors) {
    const errorFloor = document.getElementById('errorFloor');
    const errorTotalFloors = document.getElementById('errorTotalFloors');

    floor.addEventListener('input', () => validateFloor(floor, errorFloor, totalFloors, errorTotalFloors));
    totalFloors.addEventListener('input', () => validateFloor(floor, errorFloor, totalFloors, errorTotalFloors));
}

function validateFloor(floor, errorFloor, totalFloors, errorTotalFloors) {
    const floorParsed = parseInt(floor.value);
    const totalFloorsParsed = parseInt(totalFloors.value);

    if (!isNaN(floorParsed) && floorParsed > totalFloorsParsed) {
        errorFloor.textContent = `Sprat mora biti manji od ukupnog broja spratova.`;
        floor.classList.add('is-invalid');
        errorTotalFloors.textContent = `Ukupan broj spratova mora biti veći od sprata.`;
        totalFloors.classList.add('is-invalid');
    }
    else {
        errorFloor.textContent = '';
        floor.classList.remove('is-invalid');
        errorTotalFloors.textContent = '';
        totalFloors.classList.remove('is-invalid');
    }
}

// ===== IMAGE VALIDATION
function validateImages(file) {
    const regex = /(\.jpg|\.jpeg|\.png)$/i;

    if (!regex.test(file.name)) {
        errorImages.textContent = `Slika "${file.name}" je uneta u nepravilnom formatu. Podržani formati: jpg, png, jpeg.`;
        return false;
    }
    else if (file.size / 1024 > imageSize) {
        errorImages.textContent = `Slika "${file.name}" mora biti manja od ${imageSize / (imageSize / 2)}MB.`;
        return false;
    }
    errorImages.textContent = '';
    return true;
}

// SUBMIT LISTING FORM
const submitBtn = document.getElementById('submitListing');
submitBtn.addEventListener('click', e => {
    submitBtn.innerHTML = `<i class="fa-solid fa-circle-notch fa-spin me-2"></i>Postavi oglas`;

    const errorMessages = document.querySelectorAll('.clientError');

    errorMessages.forEach(error => {
        if (error.textContent) {
            e.preventDefault();
            scrollOnError();
            submitBtn.innerHTML = `<i class="fa-solid fa-check me-2"></i>Postavi oglas`;
        }
    });

    fields.forEach(fieldGroup => {
        fieldGroup.forEach(field => {
            const inputElement = document.getElementById(field.input);
            if (field.required && inputElement.value === '') {
                inputElement.classList.add('is-invalid');
                submitBtn.innerHTML = `<i class="fa-solid fa-check me-2"></i>Postavi oglas`;
            }
        })
    });
});
