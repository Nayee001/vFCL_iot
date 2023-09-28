@section('script')
    <script>
        $(function() {
            var table = $('.roles-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles-ajax-datatables') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '20px'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width: '20px'
                    },
                    {
                        data: 'guard',
                        name: 'guard',
                        orderable: false,
                        searchable: false,
                        width: '20px'
                    },
                    {
                        data: 'permissions',
                        name: 'permissions',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#form-roles-create').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('submit').attr('disabled', true);
                var formData = new FormData($('#form-roles-create')[0]);
                $.ajax({
                    method: 'POST',
                    url: '{{ route('roles.store') }}',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(resp) {
                        if (resp.code == '{{ __('statuscode.CODE200') }}') {
                            toastr.success(resp.Message);
                            setTimeout(function() {
                                location.reload();
                            }, 1900);
                        } else {
                            toastr.error(resp.Message);
                        }
                    },
                    error: function(data) {
                        $(".submit").attr("disabled", false);
                        var errors = data.responseJSON;
                        $.each(errors.errors, function(key, value) {
                            var ele = "#" + key;
                            $(ele).addClass('error');
                            $('<label class="error">' + value + '</label>').insertAfter(
                                ele);
                        });
                    }
                });
            });
        });

        $(document).on('click', '.delete-role', function(e) {
            var id = this.id;
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this role!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: "{{ url('roles') }}" + "/" + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(resp) {
                            if (resp.code == '{{ __('statuscode.CODE200') }}') {
                                toastr.success(resp.Message);
                                setTimeout(function() {
                                    location.reload();
                                }, 1900);
                            } else {
                                toastr.error(resp.Message);
                            }
                        },
                    });

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {}
            })
        });

        function getEditForm(url) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(res) {
                    $("#editModel").html(res);
                    $("#editModel").modal('show');
                }
            });
        }
    </script>
@endsection
