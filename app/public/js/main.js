clientsList = document.getElementById('clients-list');

if (clientsList) {
    clientsList.addEventListener('click', e => {
        if (e.target.className === 'btn btn-link delete-client') {
            if (confirm('Are you sure?')) {
                let id = e.target.dataset.id;

                fetch(`/client/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload())
            }
        }
    });
}

clientInsObjects = document.getElementById('client-ins-objects');
if (clientInsObjects) {
    clientInsObjects.addEventListener('click', e => {
        if (e.target.className === 'btn btn-link ins-delete') {
            if (confirm('Are you sure?')) {
                let id = e.target.dataset.id;

                fetch(`/client/insurance/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload())
            }
        }

        if (e.target.className === 'nav-link') {
            document.querySelectorAll('.nav-link.active').forEach(function(navLink) {
                navLink.classList.remove("active");
            });
            document.querySelectorAll('.table').forEach(function(table) {
                table.classList.add('d-none');
            });

            e.target.classList.add('active');
            document.querySelector("[data-id='" + e.target.getAttribute('href').replace('#', '') + "']").classList.remove('d-none');
        }
    });
}

