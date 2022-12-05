<script>
    function randomString(length, chars) {
        var result = '';
        for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
        return result;
    }

    function generatePass(){
        document.getElementById("password").value = randomString(6, '0123456789');
    }

    //Show Edit User Modal
    $(document).on('click', '#roleEditBtn', function(e) {
        e.preventDefault();
        let role_id = $(this).data('id');
        var url = "{{ route('role.edit',['role_id' => '__role_id']) }}";
        url = url.replace("__role_id", role_id);
        $.ajax({
            url: url,
            success: function(data) {
                $('.formContent').html(data);
                $('#role-edit-modal').modal({
                    backdrop: 'static',
                    keyboard: false,
                },'show');
            }
        });
    });

    //Status change
    $(document).on('click', '#changeStatusBtn', function(e) {
        e.preventDefault();
        let user_id = $(this).data('id');
        let status = $(this).data('status');
        var url = "{{ route('user.status.change',['user_id' => '__user_id','status' => '__status']) }}";
        url = url.replace("__user_id", user_id);
        url = url.replace("__status", status);
        $.ajax({
            url: url,
            success: function(data) {
                if (data.status === 'success'){
                    successMessage(data.message);
                    $('.table').load(location.href + ' .table');
                } else {
                    errorMessage(data.message);
                }
            },
            error: function() {
                errorMessage('Something went wrong. Please try again later.');
            }
        });
    });


    $('#roleAddForm').on('submit', function(e) {
        e.preventDefault();
        var url = "{{route('role.store')}}"
        var formData = new FormData(this);
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
                if (data.status === 'success'){
                    successMessage(data.message);
                    $('#roleAddForm')[0].reset();
                    $('#role-add-modal').modal('hide');
                    $('.roleData').load(location.href + ' .roleData');
                } else {
                    $.each(data.errors, function(key, value){
                        errorMessage(value);
                    })
                }
            },
            error: function() {
                errorMessage('Something went wrong. Please try again later.');
            }
        });
    });


    $(document).on('submit', '#roleEditForm', function(e){
        e.preventDefault();
        var url = "{{route('role.update')}}"
        var formData = new FormData(this);
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
                if (data.status === 'success'){
                    successMessage(data.message);
                    $('#userEditForm')[0].reset();
                    $('#user-edit-modal').modal('hide');
                    $('.table').load(location.href + ' .table');
                    console.log(data.data)
                } else {
                    $.each(data.errors, function(key, value){
                        errorMessage(value);
                    })
                }
            },
            error: function() {
                errorMessage('Something went wrong. Please try again later.');
            }
        });
    });

    //Delete Parent
    $(document).on('click', '#deleteUserBtn', function(e) {
        e.preventDefault();
        let user_id = $(this).data('id');
        var url = "{{ route('user.delete',['user_id' => '__user_id']) }}";
        url = url.replace("__user_id", user_id);
        Swal.fire({
            title:"Want to remove?",
            text:"After removing this user information will be lost",
            type:"question",
            confirmButtonColor:"#348cd4",
            showCancelButton:!0,
            confirmButtonText:"Yes, delete it!",
            cancelButtonText:"No, cancel!",
            confirmButtonClass:"btn sa-success btn-success mt-2",
            cancelButtonClass:"btn sa-error btn-danger ml-2 mt-2",
            buttonsStyling:!1
        }).then(function(t){
            if (t.value === true){
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    complete: function(data) {
                        if (data.responseJSON.status === 'success'){
                            $('.table').load(location.href + ' .table');
                            Swal.fire({
                                title: "Deleted!",
                                text: data.responseJSON.message,
                                type: "success"
                            });
                        } else {
                            Swal.fire({
                                title: "Cancelled",
                                text: data.responseJSON.message,
                                type: "error"
                            });
                        }
                    }
                })
            } else {
                t.dismiss===Swal.DismissReason.cancel&&Swal.fire({
                    title:"Cancelled",
                    text:"User is safe.",
                    type:"error"
                });
            }
        });
    });

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
