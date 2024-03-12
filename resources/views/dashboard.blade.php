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




    <x-link />

</x-app-layout>
