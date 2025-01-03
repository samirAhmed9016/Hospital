<!-- Delete Modal -->
@foreach ($doctors as $doctor)
    <div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $doctor->id }}">
                        {{ __('Dashboard/Doctors.delete_doctor') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('doctors.destroy', $doctor->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                        <p>{{ __('Dashboard/Doctors.Warning') }} <strong>{{ $doctor->name }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Dashboard/Doctors.Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Dashboard/Doctors.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
