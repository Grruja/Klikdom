// ===== OFFCANVAS OPEN & CLOSE
const myOffcanvas = document.getElementById('offcanvasNavbar');
const bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

document.getElementById("openMenu").addEventListener('click',function (e){
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
callLocationsOnKeyUp('locationSearch', 'searchDropdown');

/* functions */
function callLocationsOnKeyUp(searchId, dropdownId) {
    const locationSearch = document.getElementById(searchId);
    if (!locationSearch) return;

    const searchDropdown = document.getElementById(dropdownId);

    let timer;
    const waitTime = 1500;
    locationSearch.addEventListener('keyup', () => {
        clearTimeout(timer);

        timer = setTimeout(function() {
            if (locationSearch.value.trim().length > 2) {
                deleteLocations(searchDropdown);
                displayLocationsDropdown(searchDropdown, locationSearch);
            }
        }, waitTime);
    });
}

function displayLocationsDropdown(searchDropdown, locationSearch) {
    const searchValue = locationSearch.value.trim();

    getLocations(searchValue)
        .then(locations => {
            if (locations.length > 0) {
                displayLocations(locations, locationSearch, searchDropdown);
                searchDropdown.classList.remove('d-none');
            }
            else searchDropdown.classList.add('d-none');
        })
        .catch(error => {
            throw error;
        });

    blurLocationsDropdown(searchDropdown, locationSearch);
}

async function getLocations(location) {
    try {
        const response = await fetch(`https://api.4zida.rs/v6/autocomplete?q=${location}`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        return await response.json();
    }
    catch (error) {
        throw error;
    }
}

function displayLocations(locations, locationSearch, searchDropdown) {
    locations.forEach((location) => {
        if (location.allParentTitles.length < 1) return;

        const locationLength = location.allParentTitles.length;
        if (locationLength > 1) {
            let li = document.createElement('li');
            li.className = 'pointer border-top pt-2';
            locationIcon(li);
            pickLocation(li, locationSearch);

            for (let j = locationLength - 1; j >= -1; j--) {
                let span = document.createElement('span');

                span.innerText =  (j < 0) ? `${location.title}` : `${location.allParentTitles[j]} - `;
                li.appendChild(span);
            }
            searchDropdown.appendChild(li);
        }
    });
}

function blurLocationsDropdown(searchDropdown, locationSearch) {
    locationSearch.addEventListener('blur', () => {
        setTimeout(() => {
            searchDropdown.classList.add('d-none');
            deleteLocations(searchDropdown);
        }, 200);
    });
}

function deleteLocations(searchDropdown) {
    while (searchDropdown.firstChild) {
        searchDropdown.removeChild(searchDropdown.firstChild);
    }
}

function pickLocation(element, input) {
    element.addEventListener('click', () => {
        input.value = element.innerText;
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
                span.innerText = (boxesChecked.length < 1) ? `${box.value}` : `, ${box.value}`;
                text.appendChild(span);
                boxesChecked.push(span);
            }
            else {
                const index = boxesChecked.findIndex((span) => span.innerText.includes(box.value));
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




