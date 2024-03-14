@use('App\Models\subject', 'subject')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight d-flex justify-content-between">
            <span>create subject</span>

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('fees.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!-- amount Field -->
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">amount</label>
                                        <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                            id="amount" name="amount" placeholder="Ex: 200">
                                        @error('amount')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">date</label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            id="date" name="date" placeholder="Ex: 200">
                                        @error('date')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">subject</label>
                                        <select class="form-select " @error('subject_id') is-invalid @enderror
                                            aria-label="SUBJECT" name="subject_id">
                                            <option selected>select subject</option>
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
                            <button type="submit" class="btn btn-primary border-t-indigo-800">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <x-link />

</x-app-layout>
