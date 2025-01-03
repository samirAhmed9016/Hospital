<!-- Delete Modal -->
@foreach ($sections as $section)
    <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $section->id }}">delete section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('sections.destroy', $section->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ $section->id }}">
                        <p>{{ __('Dashboard/sections_trans.Warning') }} <strong>{{ $section->name }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Dashboard/sections_trans.Close') }}</button>
                        <button type="submit"
                            class="btn btn-danger">{{ __('Dashboard/sections_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
