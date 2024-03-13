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
                        <div class="col-md-4">
                            <b>name </b>
                            {{ $student->full_name }}
                        </div>
                        <div class="col-md-4">
                            <b>father name </b>
                            {{ $student->father_name }}
                        </div>
                        <div class="col-md-4">
                            <b>grandd father name </b>
                            {{ $student->g_f_name }}
                        </div>
                        <div class="col-md-4">
                            <b>phone </b>
                            {{ $student->phone }}
                        </div>
                        <div class="col-md-8">
                            <b>address </b>
                            {{ $student->address }}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <table class="table table-dark mt-5">
                            <div class="table-caption text-center">
                                fees table
                            </div>
                            <thead>
                                <th>fess</th>
                                <th>date</th>
                            </thead>
                            @foreach ($student->fees as $item)
                                <tr>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <x-link />

</x-app-layout>
