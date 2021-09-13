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
    });
}

