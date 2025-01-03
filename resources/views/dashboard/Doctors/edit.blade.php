<!-- Update Modal -->
@foreach ($doctors as $doctor)
    <div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">{{ __('Dashboard/Doctors.edit_doctor') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateDoctorForm" method="POST" action="{{ route('doctors.update', $doctor->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updateDoctorName">{{ __('Dashboard/Doctors.name') }}</label>
                            <input type="hidden" name="id" value="{{ $doctor->id }}">
                            <input type="text" name="name" value="{{ $doctor->name }}" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="updateDoctorEmail">{{ __('Dashboard/Doctors.email') }}</label>
                            <input type="email" name="email" value="{{ $doctor->email }}" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="updateDoctorPhone">{{ __('Dashboard/Doctors.phone') }}</label>
                            <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="updateDoctorPrice">{{ __('Dashboard/Doctors.price') }}</label>
                            <input type="text" name="price" value="{{ $doctor->price }}" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="updateDoctorAppointments">{{ __('Dashboard/Doctors.appointments') }}</label>
                            <input type="text" name="appointments" value="{{ $doctor->appointments }}"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="updateDoctorSection">{{ __('Dashboard/Doctors.section') }}</label>
                            <select name="section_id" class="form-control">
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}"
                                        {{ $doctor->section_id == $section->id ? 'selected' : '' }}>
                                        {{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Dashboard/Doctors.Close') }}</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Dashboard/Doctors.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
