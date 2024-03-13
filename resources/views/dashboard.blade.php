@use('App\Models\student', 'student')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight d-flex justify-content-between">
            <span>dashboard</span>

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">

                        <div class="col-3 p-3 ">
                            <div class="card text-center bg-yellow-400">
                                <div class="card title">
                                    students
                                </div>
                                <div class="card-body">
                                    {{ student::count() }}
                                </div>
                            </div>
                        </div>

                        <div class="col-3 p-3">
                            <div class="card text-center bg-primary">
                                <div class="card title">
                                    students fees
                                </div>
                                <div class="card-body">
                                    23
                                </div>
                            </div>
                        </div>

                        <div class="col-3 p-3">
                            <div class="card text-center bg-primary">
                                <div class="card title">
                                    subjects
                                </div>
                                <div class="card-body">
                                    23
                                </div>
                            </div>
                        </div>


                        <div class="col-3 p-3">
                            <div class="card text-center bg-primary">
                                <div class="card title">
                                    paid students
                                </div>
                                <div class="card-body">
                                    23
                                </div>
                            </div>
                        </div>

                        <div class="col-3 p-3">
                            <div class="card text-center bg-primary">
                                <div class="card title">
                                    not paid students
                                </div>
                                <div class="card-body">
                                    23
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>




    <x-link />

</x-app-layout>
