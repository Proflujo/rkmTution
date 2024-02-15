<script type="text/html" id="tmplAddNewOutSrcVehicleForm">
    <form id="frmAddNewOutSrcVehicle">

        <input type="submit" class="hide">

        <div class="row vendorAction-map">
            <div class="form-group col-12">
                <label class="col-lg-5" for="txtVendor">Vendor</label>
                <div class="input-group col-lg-7">
                    <select class="form-control selectpicker" id="txtVendor" name="txtVendor">VENDORS_LIST</select>
                    <div class="input-group-append">
                        <a class="input-group-btn" id="btnToggleVendorAction" title="Add Vendor">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row vendorAction-add mb-2" style="display: none;">
            <div class="col-12">
                <fieldset class="fieldset-group">
                    <legend>
                        <span>Add New Vendor</span>
                        <span class="ml-3">
                            <a href="javascript:void(0);" id="btnToggleVendorAction" class="text-danger" title="Choose from the Existing List">
                                <i class="fas fa-times-circle"></i>
                            </a>
                        </span>
                    </legend>
                    <div class="form-group">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-lg-5" for="txtNewVendorName">Vendor Name</label>
                            <input type="text" class="form-control col-lg-7" id="txtNewVendorName" name="txtNewVendorName">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-lg-5" for="txtNewVendorPhoneNo">Phone No</label>
                            <input type="text" class="form-control col-lg-7" id="txtNewVendorPhoneNo" name="txtNewVendorPhoneNo">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="col-lg-5" for="txtOutSrcVehicleRegnNo">Regn. No</label>
                <input type="text" class="form-control col-lg-7" id="txtOutSrcVehicleRegnNo" name="txtOutSrcVehicleRegnNo">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="col-lg-5" for="txtOutSrcVehicleType">Type</label>
                <select class="form-control col-lg-7 selectpicker" id="txtOutSrcVehicleType" name="txtOutSrcVehicleType">VEHICLE_TYPES_LIST</select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="col-lg-5" for="txtOutSrcVehicleModel">Model</label>
                <select class="form-control col-lg-7 selectpicker" id="txtOutSrcVehicleModel" name="txtOutSrcVehicleModel">VEHICLE_MODELS_LIST</select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="col-lg-5" for="txtOutSrcVehicleInsuranceDate">Insurance Date</label>
                <input type="text" class="form-control col-lg-7 date-picker" id="txtOutSrcVehicleInsuranceDate" name="txtOutSrcVehicleInsuranceDate">
            </div>
        </div>

    </form>
</script>

<script>
    const addNewOutSrcVehicleFields = Object.freeze({
        'regnNo': 'txtOutSrcVehicleRegnNo', 'vehicleType': 'txtOutSrcVehicleType', 'vehicleModel': 'txtOutSrcVehicleModel',
        'insuranceDate': 'txtOutSrcVehicleInsuranceDate', 'newVendorName': 'txtNewVendorName',
        'newVendorPhoneNo': 'txtNewVendorPhoneNo', 'vendor': 'txtVendor',
    });

    $(document).on('click', '#btnAddNewOutSrcVehicle', function(e) {
        e.preventDefault();

        onAddNewOutSrcVehicleClicked();
    });

    $(document).on('show.bs.modal', '#modal-dialog:has(#frmAddNewOutSrcVehicle)', function() {
        $(this).find('#frmAddNewOutSrcVehicle .selectpicker').each(function() {
            makeSelectPicker($(this));
        });

        $(this).find('#frmAddNewOutSrcVehicle .date-picker').each(function() {
            makeDateTimePicker($(this));
        });

        $(this).find('#frmAddNewOutSrcVehicle #txtVendor').val('').trigger('change');
        $(this).find('#frmAddNewOutSrcVehicle #txtOutSrcVehicleType').val('').trigger('change');
        $(this).find('#frmAddNewOutSrcVehicle #txtOutSrcVehicleModel').val('').trigger('change');

        $(this).find('#frmAddNewOutSrcVehicle').prop('vendorAction', 'map');
    });

    $(document).on('shown.bs.modal', '#modal-dialog:has(#frmAddNewOutSrcVehicle)', function() {
        $('#frmAddNewOutSrcVehicle #txtOutSrcVehicleRegnNo').focus();
    });

    $(document).on('click', '#modal-dialog #btnSubmitAddNewOutSrcVehicleForm', function(e) {
        e.preventDefault();

        $(this).closest('#modal-dialog').find('#frmAddNewOutSrcVehicle').submit();
    });

    $(document).on('submit', '#modal-dialog #frmAddNewOutSrcVehicle', function(e) {
        e.preventDefault();

        onAddNewOutSrcVehicleFormSubmit($(this));
    });

    $(document).on('click', '#modal-dialog #frmAddNewOutSrcVehicle #btnToggleVendorAction', function(e) {
        e.preventDefault();

        var form = $(this).closest('form');
        var currVendorAction = form.prop('vendorAction');

        if ( currVendorAction == 'map' ) {
            form.find('.vendorAction-map').hide();
            form.find('.vendorAction-add').show();
            form.find('.vendorAction-add .form-control:first').focus();

            currVendorAction = 'add';
        } else {
            form.find('.vendorAction-add').hide();
            form.find('.vendorAction-map').show();

            currVendorAction = 'map';
        }

        form.prop('vendorAction', currVendorAction);
    });

    function onAddNewOutSrcVehicleClicked() {
        createJSONAjax( baseUrl + '/masters/outsourced-vehicles/json-details/add-vehicle-fields', 'GET', function(response) {
            if ( typeof(response) != 'undefined' ) {
                if( typeof(response.error) != 'undefined' ) {
                    if ( response.error == 0 ) {
                        var vehicleTypesDDHTML = '';
                        var vehicleModelsDDHTML = '';
                        var vendorsDDHTML = '';

                        if ( typeof(response.vehicleTypesList) != 'undefined' ) {
                            $.each( response.vehicleTypesList, function (id, name) {
                                vehicleTypesDDHTML += '<option value="' + id + '">' + name + '</option>';
                            } );
                        }

                        if ( typeof(response.vehicleModelsList) != 'undefined' ) {
                            $.each( response.vehicleModelsList, function (id, name) {
                                vehicleModelsDDHTML += '<option value="' + id + '">' + name + '</option>';
                            } );
                        }

                        if ( typeof(response.vendorsList) != 'undefined' ) {
                            $.each( response.vendorsList, function (id, name) {
                                vendorsDDHTML += '<option value="' + id + '">' + name + '</option>';
                            } );
                        }

                        showAddNewOutSrcVehicleModel({
                            'vehicleTypesDDHTML': vehicleTypesDDHTML,
                            'vehicleModelsDDHTML': vehicleModelsDDHTML,
                            'vendorsDDHTML': vendorsDDHTML,
                        });
                    } else {
                        alert( response.message ?? 'Some error occurred. Please contact support!' );
                    }
                }
            }
        } );
    }

    function showAddNewOutSrcVehicleModel(options = {}) {
        var modelHTML = $('#tmplAddNewOutSrcVehicleForm').html();
            modelHTML = modelHTML.replaceAll('VEHICLE_TYPES_LIST', options.vehicleTypesDDHTML ?? '');
            modelHTML = modelHTML.replaceAll('VEHICLE_MODELS_LIST', options.vehicleModelsDDHTML ?? '');
            modelHTML = modelHTML.replaceAll('VENDORS_LIST', options.vendorsDDHTML ?? '');

        var footerBtnsHTML = '<button class="btn btn-theme" id="btnSubmitAddNewOutSrcVehicleForm"><i class="fas fa-plus"></i> Add</button>';

        showModelWindow( 'Add New Outsourced Vehicle', modelHTML, footerBtnsHTML, '', false, 'Cancel' );
    }

    function onAddNewOutSrcVehicleFormSubmit(form) {
        var input = {};
        var modal = form.closest('#modal-dialog');
        var currVendorAction = form.prop('vendorAction');

        form.find('.has-error > .help-block').remove();
        form.find('.has-error').removeClass('has-error');

        input = {
            'vendorAction': currVendorAction ?? 'map',
            'regnNo': form.find('#txtOutSrcVehicleRegnNo').val(),
            'vehicleType': form.find('#txtOutSrcVehicleType').val(),
            'vehicleModel': form.find('#txtOutSrcVehicleModel').val(),
            'insuranceDate': form.find('#txtOutSrcVehicleInsuranceDate').val(),
        };

        if ( input.vendorAction == 'map' ) {
            input['vendor'] = form.find('#txtVendor').val();
        } else {
            input['newVendorName'] = form.find('#txtNewVendorName').val();
            input['newVendorPhoneNo'] = form.find('#txtNewVendorPhoneNo').val();
        }

        // modal.find('#btnSubmitAddNewOutSrcVehicleForm').addClass('form-submitting');

        createJSONAjax( baseUrl + '/masters/outsourced-vehicles/add-vehicle', 'POST', function(response) {
            if ( typeof(response) != 'undefined' ) {
                if( typeof(response.error) != 'undefined' ) {
                    if ( response.error == 0 ) {
                        modal.find('.modal-footer > [data-dismiss="modal"]').click();

                        if ( typeof(response.data) != 'undefined' ) {
                            var data = response.data;

                            form.trigger( 'addNewOutSrcForm.added', [ data ] );
                        } else {
                            form.trigger( 'addNewOutSrcForm.added' );
                        }
                    } else {
                        if ( typeof(response.validationErrors) != 'undefined' ) {
                            $.each( response.validationErrors, function ( fieldId, message ) {
                                showFieldValidationMsg( form.find('#' + addNewOutSrcVehicleFields[fieldId]), message[0], false );
                            } );
                        }

                        alert( response.message ?? 'Some error occurred. Please contact support!' );
                    }
                }
            }
        }, input, form );
    }
</script>
