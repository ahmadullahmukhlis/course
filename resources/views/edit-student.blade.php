@use('App\Models\subject', 'subject')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight d-flex justify-content-between">
            <span>update student</span>

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <!-- Name Field -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ $student->full_name }}"
                                            placeholder="Ex: Mukhlis">
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
                                            id="father_name" name="father_name" value="{{ $student->father_name }}"
                                            placeholder="Ex: Mukhlis">
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
                                            id="g_father_name" value="{{ $student->g_f_name }}" name="g_father_name"
                                            placeholder="Ex: Mukhlis">
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
                                            id="phone" name="phone" value="{{ $student->phone }}"
                                            placeholder="Ex: 0779404681">
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
                                            name="address" value="{{ $student->address }}"
                                            placeholder="Ex: Kabul, Afghanistan">
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
                                            <option selected>select subject</option>
                                            <option value="{{ $student->name }}">{{ $student->name }}</option>
                                            @foreach (subject::get() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
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

                            <button type="submit" class="btn btn-secondary">update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <x-link />

</x-app-layout>
