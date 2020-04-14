document.querySelector('#renewall').classList.add('disabled');
if (location.reload) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxes[i].checked = false;
        }
    }
}

function toggle(source) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    // let count = 0;
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source) {
            checkboxes[i].checked = source.checked;
        }

        changeStatus();
    }
}

function changeStatus() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            document.querySelector('#renewall').classList.remove('disabled');
            return;
        }
        document.querySelector('#renewall').classList.add('disabled');
    }
}

function selected(checkbox) {
    changeStatus();
}

function renewOne(source) {
    const book_id = +(source.parentElement.parentElement.firstElementChild.getAttribute('book_id'));
    const user_id = +(source.parentElement.parentElement.firstElementChild.getAttribute('user_id'));

    axios.patch('/borrowed/' + user_id, { bookID: book_id })
        .then(response => {
            console.log(response.data);

            span = document.createElement('SPAN');
            console.log(span);
            span.innerHTML = 'cannot be renewed<br>renwed today';
            span.style.color = "red";
            console.log(source.parentElement.appendChild(span));
            source.parentElement.children[0].remove(this);

            // console.log(source.style.display="hidden");
        })
        .catch(err => { console.log(err); });
}

function renewBooks() {
    var user_id;
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const bookIDs = [];
    checkboxes.forEach(check => {
        if ((check.checked) && check.parentElement.hasAttribute('book_id')) {
            bookIDs.push(+(check.parentElement.getAttribute('book_id')));
            user_id = check.parentElement.getAttribute('user_id');
        }
    });

    if (bookIDs.length > 0) {
        axios.patch('/borrowed/' + user_id, { data: bookIDs })
            .then(response => { console.log(response.data); })
            .catch(err => { console.log(err); });

    }
}