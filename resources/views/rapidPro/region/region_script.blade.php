<script>

    $(document).ready(function() {
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
        $('#myModal').modal('hide');
        $('#showModal').modal('hide');
        $('#confirmModal').modal('hide');
    }

    function addNewModalShow() {

        $('#addNew').click(function() {
            myFormReset();
            $('.modal-title').text('Add New  Region');
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
                url: "{{ route('regions.view') }}",
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    searchable: false,
                    bSortable:false,
                },
                {
                    data:'name',
                },
                {
                    data:'creator.name', 
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

            let url = "{{route('regions.store')}}"

            if ($('#action').val() === 'edit') {
                let regionId = $('#region_id').val();
                url = "{{ route('regions.update',['region'=> '__regionId']) }}"
                url = url.replace("__regionId", regionId);
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
            let regionId = $(this).data('region-id');
            myFormReset();
            let showTable = $('#showTable');
            showTable.html('');
            let url = "{{ route('regions.getregionById',['region' => '__regionId']) }}";
            url = url.replace("__regionId", regionId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    var region = data.responseJSON.region;
                    var html = '<tr><th> Name</th><td>' + region.name + '</td></tr>';
                    showTable.html(html);

                    $('.modal-title').text('Region Area Details');
                    // $('#showModal').modal({
                    //     backdrop: 'static',
                    //     keyboard: false,
                    // },'show');
                    $('#showModal').modal('show');
                }
            })
        });

    }

    function editModalShow() {
        $(document).on('click', '.edit', function() {
            let regionId = $(this).data('region-id');

            let url = "{{ route('regions.getregionById',['region' => '__regionId']) }}";
            url = url.replace("__regionId", regionId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    let region = data.responseJSON.region;
                    $('#myForm input[name="_method"]').val('PATCH');
                    $('#name').val(region.name);
                    $('#region_id').val(regionId);
                    $('#action').val('edit');
                    $('.modal-title').text('Edit Region Data');
                    $('#myModal').modal('show');
                }
            })
        });

    }


    function confirmDeleteModalShow() {
        $(document).on('click', '.delete', function() {
            let regionId = $(this).data('region-id');
            let regionName = $(this).data('area-name');
            $('#areaId').val(regionId);
            $('#deleteValueName').html(regionName);
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
                url: '{{route("regions.regiondeleteById")}}',
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
