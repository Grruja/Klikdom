// ===== OFFCANVAS OPEN & CLOSE
const myOffcanvas = document.getElementById('offcanvasNavbar');
const bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

document.getElementById("openMenu").addEventListener('click',function (e){
    e.preventDefault();
    bsOffcanvas.toggle();
});


// ===== CHECKBOX DROPDOWN
dropdownCheckboxes('suitable', 'suitableText', 'suitableDropdown');

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
            li.className = 'pointer border-bottom pb-2';
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
