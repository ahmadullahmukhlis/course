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
                    <form action="{{ route('students.store') }}">
                        @csrf
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
    </div>




    <x-link />

</x-app-layout>
