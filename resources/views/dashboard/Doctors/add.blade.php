<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Dashboard/Doctors.create_doctor') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createDoctorForm" method="POST" action="{{ route('doctors.store') }}">
                @csrf <!-- Include CSRF token for Laravel -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="doctorName">{{ __('Dashboard/Doctors.name') }}</label>
                        <input type="text" class="form-control" id="doctorName" name="name"
                            placeholder="{{ __('Dashboard/Doctors.enter_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="doctorEmail">{{ __('Dashboard/Doctors.email') }}</label>
                        <input type="email" class="form-control" id="doctorEmail" name="email"
                            placeholder="{{ __('Dashboard/Doctors.enter_email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="doctorPassword">{{ __('Dashboard/Doctors.password') }}</label>
                        <input type="password" class="form-control" id="doctorPassword" name="password"
                            placeholder="{{ __('Dashboard/Doctors.enter_password') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="doctorPhone">{{ __('Dashboard/Doctors.phone') }}</label>
                        <input type="text" class="form-control" id="doctorPhone" name="phone"
                            placeholder="{{ __('Dashboard/Doctors.enter_phone') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="doctorPrice">{{ __('Dashboard/Doctors.price') }}</label>
                        <input type="number" class="form-control" id="doctorPrice" name="price"
                            placeholder="{{ __('Dashboard/Doctors.enter_price') }}" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="doctorAppointments">{{ __('Dashboard/Doctors.appointments') }}</label>
                        <select class="form-control" id="doctorAppointments" name="appointments" required>
                            <option value="{{ __('Dashboard/Doctors.monday') }}">{{ __('Dashboard/Doctors.monday') }}
                            </option>
                            <option value="{{ __('Dashboard/Doctors.tuesday') }}">
                                {{ __('Dashboard/Doctors.tuesday') }}</option>
                            <option value="{{ __('Dashboard/Doctors.wednesday') }}">
                                {{ __('Dashboard/Doctors.wednesday') }}</option>
                            <option value="{{ __('Dashboard/Doctors.thursday') }}">
                                {{ __('Dashboard/Doctors.thursday') }}</option>
                            <option value="{{ __('Dashboard/Doctors.friday') }}">{{ __('Dashboard/Doctors.friday') }}
                            </option>
                            <option value="{{ __('Dashboard/Doctors.saturday') }}">
                                {{ __('Dashboard/Doctors.saturday') }}</option>
                            <option value="{{ __('Dashboard/Doctors.sunday') }}">{{ __('Dashboard/Doctors.sunday') }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="doctorSection">{{ __('Dashboard/Doctors.section') }}</label>
                        <select class="form-control" id="doctorSection" name="section_id" required>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('Dashboard/Doctors.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Dashboard/Doctors.create_doctor') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
