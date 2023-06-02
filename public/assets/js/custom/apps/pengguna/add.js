"use strict";

// Class definition
var KTModalpenggunaAdd = function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var form;
    var modal;

    var handleFail = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status == 422) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan!',
                text: JSON.parse(jqXHR.responseText).message,
            }).then(function (result) {
                if (result.isConfirmed) {
                    submitButton.removeAttribute('data-kt-indicator');
                    submitButton.disabled = false;
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: JSON.parse(jqXHR.responseText).message
            }).then(function (result) {
                if (result.isConfirmed) {
                    submitButton.removeAttribute('data-kt-indicator');
                    submitButton.disabled = false;
                }
            });
        }
    }
    // Init form inputs
    var handleForm = function () {
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Satuan Wajib Diisi!'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Satuan Wajib Diisi!'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Satuan Wajib Diisi!'
                            }
                        }
                    },
                    'role': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Satuan Wajib Diisi!'
                            }
                        }
                    },
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

        $(form.querySelector('[name="pengguna"]')).on('change', function () {
            // Revalidate the field when an option is chosen
            validator.revalidateField('pengguna');
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
                            url: kode ? `/pengguna/${kode}/update` : "/pengguna/store",
                            data: {
                                name: form.querySelector('[name="name"]').value,
                                email: form.querySelector('[name="email"]').value,
                                password: form.querySelector('[name="password"]').value,
                                role: form.querySelector('[name="role"]').value,
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
                                        $('#kt_modal_add_pengguna').modal('hide');

                                        submitButton.disabled = false;

                                        $('#kt_pengguna_table').DataTable().ajax.reload();
                                    }
                                });
                            },
                            error: handleFail
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
        });

        $('.add_pengguna').click(function (e) {
            e.preventDefault();
            $(submitButton).data('kode', '');
            $(form.querySelector('[name="name"]')).val('');
            $(form.querySelector('[name="email"]')).val('');
            $(form.querySelector('[name="password"]')).val('');
            $(form.querySelector('[name="role"]')).val('');
        });
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_pengguna'));

            form = document.querySelector('#kt_modal_add_pengguna_form');
            submitButton = form.querySelector('#kt_modal_add_pengguna_submit');
            cancelButton = form.querySelector('#kt_modal_add_pengguna_cancel');
            closeButton = form.querySelector('#kt_modal_add_pengguna_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalpenggunaAdd.init();
});
