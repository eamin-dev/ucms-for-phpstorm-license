<script>

    $(document).ready(function() {
        $('#country_office_id').select2();
        addNewModalShow();
        renderViewDataTable();
        submitForm();
        editModalShow();
        showModalShow();
        confirmDeleteModalShow();
        deleteData();
    });

    function myFormReset() {
        $('#myForm')[0].reset();
        $('#country_office_id').val('').trigger('change');
        $('#myModal').modal('hide');
        $('#showModal').modal('hide');
        $('#confirmModal').modal('hide');
    }

    function addNewModalShow() {

        $('#addNew').click(function() {
            myFormReset();
            $('.modal-title').text('Add Rapid Pro ');
            $('#action').val('addNew');
            $('#myForm input[name="_method"]').val('POST');
            $('#myModal').modal('show');
        });
    }

    function renderViewDataTable() {
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('rapid.flow.view') }}",
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    searchable: false,
                    bSortable:false,
                },
                {
                    data: 'file_id',
                },
                {
                    data: 'date',
                },

                {
                    data: 'actionBtn',
                    searchable: false,
                    orderable: false,
                },
            ]
        });
        $('#btnSearch').click(function(){
            $('#userTable').DataTable().draw(true);
        });

    }

    function submitForm() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault();

            let url = "{{route('rapid.flow.store')}}"

            if ($('#action').val() === 'edit') {
                let flowId = $('#flow_id').val();
                url = "{{ route('rapid.flow.update',['flow' => '__flowId']) }}";
                url = url.replace("__flowId", flowId);
            }

            let formData = new FormData(this);


            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                complete: function(data) {
                    if (data.status === 422) {
                        $.each(data.responseJSON.errors, function(key, value) {
                            console.log(value);
                            errorMessage(value);
                        });
                        return;
                    }

                    if (data.status >= 400) {
                        errorMessage(data.responseJSON.message);
                        return;
                    }

                    successMessage(data.responseJSON.message);
                    myFormReset();
                    $('#userTable').DataTable().ajax.reload();
                    $('#myModal').modal('hide');

                },
            });

        });

    }

    function showModalShow() {
        $(document).on('click', '.showDetails', function() {
            let flowId = $(this).data('flow-id');
            myFormReset();
            let showTable = $('#showTable');
            showTable.html('');
            let url = "{{ route('rapid.flow.getRapidFlowId',['flow' => '__flowId']) }}";
            url = url.replace("__flowId", flowId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    var district = data.responseJSON.district;
                    var html = '<tr><th>Zone </th><td>' + district.zone.name + '</td></tr>';
                    html += '<tr><th> Name(En)</th><td>' + district.name + '</td></tr>';
                    html += '<tr><th> Name(Bn)</th><td>' + district.bn_name + '</td></tr>';
                    showTable.html(html);

                    $('.modal-title').text('District Details');
                    $('#showModal').modal('show');
                }
            })
        });

    }

    function editModalShow() {
        $(document).on('click', '.edit', function() {
            let flowId = $(this).data('flow-id');

            let url = "{{ route('rapid.flow.getRapidFlowId',['flow' => '__flowId']) }}";
            url = url.replace("__flowId", flowId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    let flow = data.responseJSON.flow;
                    $('#myForm input[name="_method"]').val('PATCH');
                    $('#country_office_id').val(flow.country_office_id);
                    $('#themefic_area_id').val(flow.themefic_area_id);
                    $('#date').val(flow.date).trigger('change');
                    $('#file_id').val(flow.file_id).trigger('change');
                    $('#flow_id').val(districtId);
                    $('#action').val('edit');
                    $('.modal-title').text('Edit RapidPro Flow Data');
                    $('#myModal').modal('show');
                }
            })
        });

    }


    function confirmDeleteModalShow() {
        $(document).on('click', '.delete', function() {
            let districtId = $(this).data('flow-id');
            let districtName = $(this).data('district-name');
            $('#districtId').val(districtId);
            $('#deleteValueName').html(districtName);
            $('#deleteValueError').html('');
            $('.modal-title').text('Confirmation');
            $('#confirmModal').modal('show');
        });
    }

    function deleteData() {
        $(".deleteById").click(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '{{route("rapid.flow.flowDeleteById")}}',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#okBtn').text('Deleting...').prop("disabled", true);
                },
                complete: function(data) {
                    if (data.status >= 400) {
                        $('#okBtn').text('OK').prop("disabled", false);
                        $('#deleteValueError').html(data.responseJSON.message);
                        errorMessage(data.responseJSON.message);
                        return;
                    }
                    setTimeout(function() {
                        $('#userTable').DataTable().ajax.reload();
                        successMessage(data.responseJSON.message);
                        $('#confirmModal').modal('hide');
                        $('#okBtn').text('OK').prop("disabled", false);
                    }, 1500);
                }
            })

        });
    }

    function successMessage(message) {
        Command: toastr["success"](message)
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "100",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }

    function errorMessage(message) {
        Command: toastr["error"](message)

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    }

</script>
