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
            $('.modal-title').text('Add New ThemeFic Area');
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
                url: "{{ route('themefic-area.view') }}",
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    searchable: false,
                    bSortable:false,
                },
                {
                    data: 'code',
                },
                {
                    data:'name',
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

            let url = "{{route('themefic-area.store')}}"

            if ($('#action').val() === 'edit') {
                let areaId = $('#area_id').val();
                url = "{{ route('themefic-area.update',['area'=> '__areaId']) }}"
                url = url.replace("__areaId", areaId);
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
            let areaId = $(this).data('area-id');
            myFormReset();
            let showTable = $('#showTable');
            showTable.html('');
            let url = "{{ route('themefic-area.getAreaById',['area' => '__areaId']) }}";
            url = url.replace("__areaId", areaId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    var area = data.responseJSON.area;
                    var html = '<tr> <th> Code </th><td>' +area.code + '</td> </tr>';
                    var html = '<tr><th> Name</th><td>' + area.name + '</td></tr>';
                    showTable.html(html);

                    $('.modal-title').text('Themefic Area Details');
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
            let areaId = $(this).data('area-id');

            let url = "{{ route('themefic-area.getAreaById',['area' => '__areaId']) }}";
            url = url.replace("__areaId", areaId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    let area = data.responseJSON.area;
                    $('#myForm input[name="_method"]').val('PATCH');
                    $('#name').val(area.name);
                    $('#code').val(area.code);
                    $('#area_id').val(areaId);
                    $('#action').val('edit');
                    $('.modal-title').text('Edit Themefic-Area Data');
                    $('#myModal').modal('show');
                }
            })
        });

    }


    function confirmDeleteModalShow() {
        $(document).on('click', '.delete', function() {
            let areaId = $(this).data('area-id');
            let areaName = $(this).data('area-name');
            $('#areaId').val(areaId);
            $('#deleteValueName').html(areaName);
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
                url: '{{route("themefic-area.areaDeleteById")}}',
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
