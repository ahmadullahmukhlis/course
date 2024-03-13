<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight d-flex justify-content-between">
            <span>students</span>
            <a href="{{ route('students.create') }}"class="btn btn-primary">create new student</a>
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
                                <th>edit</th>
                                <th>delete</th>
                                <th>profile</th>

                            </thead>
                            <tbody>
                                @foreach ($students as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->father_name }}</td>
                                        <td>{{ $item->g_f_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td class="btn btn-warning"><a
                                                href="{{ route('students.edit', $item->id) }}">edit</a></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </div>
    <x-link />
</x-app-layout>
