"use strict";

// Class definition
var KTPegawaisList = function () {
    var datatable;
    var table;
    var form;
    var submitButton;

    var initPegawaiList = function () {
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
                url: "/pegawai/list"
            },
            columns: [
                {
                    name: 'kode',
                    data: 'kode',
                },
                {
                    name: 'nip',
                    data: 'nip',
                },
                {
                    name: 'nama',
                    data: 'nama',
                },
                {
                    name: 'jenis_kelamin',
                    data: 'jenis_kelamin',
                },
                {
                    name: 'tempat_lahir',
                    data: 'tempat_lahir',
                },
                {
                    name: 'tanggal_lahir',
                    data: 'tanggal_lahir',
                },
                {
                    name: 'no_hp',
                    data: 'no_hp',
                },
                {
                    name: 'alamat',
                    data: 'alamat',
                },
                {
                    name: 'action',
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
            handleDeleteRows();
            handleEditRows();
        });
    }

    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-pegawai-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-pegawai-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');
                const kode = $(this).data('kode');

                // Get pegawai name
                const pegawaiName = parent.querySelectorAll('td')[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + pegawaiName + "?",
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
                            url: `/pegawai/${kode}/destroy`,
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
                            text: pegawaiName + " was not deleted.",
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
        const editButtons = table.querySelectorAll('[data-kt-pegawai-table-filter="edit_row"]');

        editButtons.forEach(d => {
            d.addEventListener('click', function (e) {
                e.preventDefault();
                var kode = $(this).data('kode');
                $.ajax({
                    type: "GET",
                    url: `/pegawai/${kode}/edit`,
                    dataType: "JSON",
                    success: function (response) {
                        $(form.querySelector('[name="nip"]')).val(response.nip);
                        $(form.querySelector('[name="nama"]')).val(response.nama);
                        $(form.querySelector('[name="jenis_kelamin"]')).val(response.jenis_kelamin).trigger('change');
                        $(form.querySelector('[name="tempat_lahir"]')).val(response.tempat_lahir);
                        $(form.querySelector('[name="tanggal_lahir"]')).val(response.tanggal_lahir);
                        $(form.querySelector('[name="no_hp"]')).val(response.no_hp);
                        $(form.querySelector('[name="alamat"]')).val(response.alamat);
                        $(submitButton).data('kode', kode);
                        $('#kt_modal_add_pegawai').modal('show');
                    }
                });
            })
        });
    }

    return {
        init: function () {
            table = document.querySelector('#kt_pegawai_table');
            form = document.querySelector('#kt_modal_add_pegawai_form');
            submitButton = form.querySelector('#kt_modal_add_pegawai_submit');
            if (!table) {
                return;
            }

            initPegawaiList();
            handleSearchDatatable();
            handleDeleteRows();
            handleEditRows();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTPegawaisList.init();
});
