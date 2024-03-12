<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight d-flex justify-content-between">
            <span>create student</span>

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!-- Name Field -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Ex: Mukhlis">
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Father Name Field -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="father_name" class="form-label">Father Name</label>
                                        <input type="text"
                                            class="form-control @error('father_name') is-invalid @enderror"
                                            id="father_name" name="father_name" placeholder="Ex: Mukhlis">
                                        @error('father_name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Grand Father Name Field -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="g_father_name" class="form-label">Grand Father Name</label>
                                        <input type="text"
                                            class="form-control @error('g_father_name') is-invalid @enderror"
                                            id="g_father_name" name="g_father_name" placeholder="Ex: Mukhlis">
                                        @error('g_father_name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Phone Field -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="Ex: 0779404681">
                                        @error('phone')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address Field -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address" placeholder="Ex: Kabul, Afghanistan">
                                        @error('address')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Address Field -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">subject</label>
                                        <select class="form-select " @error('subject_id') is-invalid @enderror
                                            aria-label="SUBJECT" name="subject_id">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        @error('subject_id')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
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
    </div>




    <x-link />

</x-app-layout>
