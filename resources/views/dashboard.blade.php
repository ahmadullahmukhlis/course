<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight d-flex justify-content-between">
            <span>student</span>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#student_modal">add</button>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover" id="student">
                            <thead class="">
                                <th>#</th>
                                <th>name</th>
                                <th>father name</th>
                                <th>grand father name</th>
                                <th>address</th>
                                <th>phone</th>
                                <th>action</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="student_modal" tabindex="-1" aria-labelledby="student_modalLabel" aria-hidden="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="student_modalLabel">Add new student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="student_form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Ex:mukhlis">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="father_name" class="form-label">father name</label>
                                    <input type="text" class="form-control" id="father_name" father
                                        name="father_name" placeholder="Ex:mukhlis">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="g_father_name" class="form-label">grand father name</label>
                                    <input type="text" class="form-control" id="g_father_name" father
                                        name="g_father_name" placeholder="Ex:mukhlis">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">phone</label>
                                    <input type="text" class="form-control" id="phone" father name="phone"
                                        placeholder="Ex:0779404681">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">address</label>
                                    <input type="text" class="form-control" id="address" father name="address"
                                        placeholder="Ex: kabul afghanistan ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-link />
    <script>
        $(document).ready(function() {
            $('#student_form').on('submit', function(e) {
                e.preventDefault()
                const formData = new FormData(this)
                rout = "{{ route('students.store') }}"
                axios.post(rout, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {
                        $('#student_modal').modal('hide');
                        // Refresh the current page
                        alert("the record has been saved ");
                        location.reload(true);
                        $('#unit_form')[0].reset();

                    })
                    .catch(function(error) {
                        if (error.response && error.response.status === 422) {
                            // Clear previous errors
                            $('.is-invalid').removeClass('is-invalid');
                            $('.invalid-feedback').remove();


                            // Get the errors from response
                            var errors = error.response.data.errors;

                            // Loop over the errors object
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    // Find the form input with the name of the key
                                    var input = $('[name=' + key + ']');
                                    // Add invalid class and append the error message
                                    input.addClass('is-invalid');
                                    input.after('<span class="invalid-feedback" role="alert"><strong>' +
                                        errors[key]
                                        [0] + '</strong></span>');
                                }
                            }
                        } else {
                            // Handle other errors
                            toastr.error('An error occurred. Please try again.');
                        }
                    });
            })
        })
    </script>
</x-app-layout>
