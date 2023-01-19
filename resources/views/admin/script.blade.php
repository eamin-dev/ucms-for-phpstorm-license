<script>

function randomString(length, chars) {
        var result = '';
        for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
        return result;
    }

    function generatePass(){
        document.getElementById("password").value = randomString(8, '0123456789');
    }


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
        $('#country_office_id').val('').trigger('change');
        $('#myModal').modal('hide');
        $('#showModal').modal('hide');
        $('#confirmModal').modal('hide');
    }

    function addNewModalShow() {

        $('#addNew').click(function() {
            myFormReset();
            $('.modal-title').text('Add New Admin');
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
                url: "{{ route('admins.view') }}",
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    searchable: false,
                    bSortable:false,
                },
                {
                    data: 'name',
                },
                {
                    data: 'email',
                },
                {
                    data: 'region.name',
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

            let url = "{{route('admins.store')}}"

            if ($('#action').val() === 'edit') {
                let adminId = $('#admin_id').val();
                url = "{{ route('admins.update',['admin' => '__adminId']) }}";
                url = url.replace("__adminId", adminId);
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
            let adminId = $(this).data('admin-id');
            myFormReset();
            let showTable = $('#showTable');
            showTable.html('');
            let url = "{{ route('admins.getadminById',['admin' => '__adminId']) }}";
            url = url.replace("__adminId", adminId);

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
            let adminId = $(this).data('admin-id');

            let url = "{{ route('admins.getadminById',['admin' => '__adminId']) }}";
            url = url.replace("__adminId", adminId);

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                complete: function(data) {
                    let admin = data.responseJSON.admin;
                    $('#myForm input[name="_method"]').val('PATCH');
                    $('#region_id').val(admin.region_id).trigger('change');
                    $('#name').val(admin.name);
                    $('#email').val(admin.email);
                    $('#password').val(admin.password);
                    $('#admin_id').val(adminId);
                    $('#action').val('edit');
                    $('.modal-title').text('Edit Admin  Data');
                    $('#myModal').modal('show');
                   // console.log(flow);
                }
            })
        });

    }


    function confirmDeleteModalShow() {
        $(document).on('click', '.delete', function() {
            let adminId = $(this).data('admin-id');
            let fileName = $(this).data('admin-name');
            $('#adminId').val(adminId);
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
                url: '{{route("admins.admindeleteById")}}',
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

        //let flowId = $(this).data('admin-id');
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
