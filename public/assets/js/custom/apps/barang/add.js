"use strict";

// Class definition
var KTModalbarangAdd = function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'nama': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Barang Wajib Diisi!'
                            }
                        }
                    },
                    'harga': {
                        validators: {
                            notEmpty: {
                                message: 'Harga Barang Wajib Diisi!'
                            }
                        }
                    },
                    'satuan': {
                        validators: {
                            notEmpty: {
                                message: 'Satuan Barang Wajib Diisi!'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        $(form.querySelector('[name="satuan"]')).on('change', function () {
            // Revalidate the field when an option is chosen
            validator.revalidateField('satuan');
        });

        // Action buttons
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        var kode = $(submitButton).data('kode');

                        $.ajax({
                            type: kode ? "PUT" : "POST",
                            url: kode ? `/data-barang/${kode}/update` : "/data-barang/store",
                            data: {
                                nama: form.querySelector('[name="nama"]').value,
                                harga: form.querySelector('[name="harga"]').value,
                                satuan_kode: form.querySelector('[name="satuan"]').value
                            },
                            dataType: "JSON",
                            success: function (response) {
                                submitButton.removeAttribute('data-kt-indicator');

                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {
                                    if (result.isConfirmed) {
                                        // Hide modal
                                        $('#kt_modal_add_barang').modal('hide');

                                        submitButton.disabled = false;

                                        $('#kt_barang_table').DataTable().ajax.reload();
                                    }
                                });
                            },
                        });


                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        closeButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        })

        $('.add_barang').click(function (e) {
            e.preventDefault();
            $(submitButton).data('kode', '');
            $(form.querySelector('[name="nama"]')).val('');
            $(form.querySelector('[name="harga"]')).val('');
            $(form.querySelector('[name="satuan"]')).val('').trigger('change');
        });
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_barang'));

            form = document.querySelector('#kt_modal_add_barang_form');
            submitButton = form.querySelector('#kt_modal_add_barang_submit');
            cancelButton = form.querySelector('#kt_modal_add_barang_cancel');
            closeButton = form.querySelector('#kt_modal_add_barang_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalbarangAdd.init();
});
