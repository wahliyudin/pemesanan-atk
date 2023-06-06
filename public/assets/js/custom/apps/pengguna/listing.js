"use strict";

// Class definition
var KTSatuansList = function () {
    var datatable;
    var table;
    var form;
    var submitButton;

    var initSatuanList = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[5].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
            dateRow[5].setAttribute('data-order', realDate);
        });

        datatable = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[0, 'asc']],
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },
            ajax: {
                type: "POST",
                url: "/pengguna/list"
            },
            columns: [
                {
                    name: 'nip',
                    data: 'nip',
                },
                {
                    name: 'name',
                    data: 'name',
                },
                {
                    name: 'email',
                    data: 'email',
                },
                {
                    name: 'role',
                    data: 'role',
                },
                {
                    name: 'action',
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        datatable.on('draw', function () {
            handleDeleteRows();
            handleEditRows();
        });
    }

    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-pengguna-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-pengguna-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');
                const kode = $(this).data('kode');

                // Get pengguna name
                const penggunaName = parent.querySelectorAll('td')[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + penggunaName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: `/pengguna/${kode}/destroy`,
                            dataType: "JSON",
                            success: function (response) {
                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function () {
                                    datatable.row($(parent)).remove().draw();
                                });
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: penggunaName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    var handleEditRows = () => {
        const editButtons = table.querySelectorAll('[data-kt-pengguna-table-filter="edit_row"]');

        editButtons.forEach(d => {
            d.addEventListener('click', function (e) {
                e.preventDefault();
                var kode = $(this).data('kode');
                $.ajax({
                    type: "GET",
                    url: `/pengguna/${kode}/edit`,
                    dataType: "JSON",
                    success: function (response) {
                        $(form.querySelector('[name="nip"]')).val(response.nip);
                        $(form.querySelector('[name="name"]')).val(response.name);
                        $(form.querySelector('[name="email"]')).val(response.email);
                        $(form.querySelector('[name="role"]')).val(response.role).trigger('change');
                        $(submitButton).data('kode', kode);
                        $('#kt_modal_add_pengguna').modal('show');
                    }
                });
            })
        });
    }

    return {
        init: function () {
            table = document.querySelector('#kt_pengguna_table');
            form = document.querySelector('#kt_modal_add_pengguna_form');
            submitButton = form.querySelector('#kt_modal_add_pengguna_submit');
            if (!table) {
                return;
            }

            initSatuanList();
            handleSearchDatatable();
            handleDeleteRows();
            handleEditRows();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSatuansList.init();
});
