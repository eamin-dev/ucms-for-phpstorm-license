<script>

    $(document).ready(function() {
        $('.select2').select2();
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
        $('#region_id').val('').trigger('change');
        $('#myModal').modal('hide');
        $('#showModal').modal('hide');
        $('#confirmModal').modal('hide');
    }

    function addNewModalShow() {

        $('#addNew').click(function() {
            myFormReset();
            $('.modal-title').text('Create File');
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
                    title: 'SL',
                    searchable: false,
                    bSortable:false,
                },
                {
                    data: 'file_id',
                    title: 'File ID',
                },
                {
                    data: 'date',
                    title: 'Date',
                },
                {
                    data: 'time',
                    title: 'Time',
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
            let flowId = $(this).data('file-id');
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
            let flowId = $(this).data('file-id');

            let url = "{{ route('rapid.flow.getRapidFlowId',['flow' => '__flowId']) }}";
            url = url.replace("__flowId", flowId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    let flow = data.responseJSON.flow;
                    $('#myForm input[name="_method"]').val('PATCH');
                    $('#region_id').val(flow.region_id).trigger('change');
                    $('#country_id').val(flow.country_id).trigger('change');
                    $('#themefic_area_id').val(flow.themefic_area_id).trigger('change');
                    // $('#date').val(flow.date);
                    $('#file_id').val(flow.file_id);
                    $('#flow_id').val(flowId);
                    $('#action').val('edit');
                    $('.modal-title').text('Edit RapidPro Flow Data');
                    $('#myModal').modal('show');
                   // console.log(flow);
                }
            })
        });

    }


    function confirmDeleteModalShow() {
        $(document).on('click', '.delete', function() {
            let flowId = $(this).data('file-id');
            let fileName = $(this).data('file_id');
            $('#flowId').val(flowId);
            $('#deleteValueName').html(fileName);
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

    function newPage($id){

        //let flowId = $(this).data('file-id');
        //alert($id);

        let url = "{{ route('rapid.view-flow',['flow' => '__flowId']) }}";
            url = url.replace("__flowId", $id);
        window.location.href = url;
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
