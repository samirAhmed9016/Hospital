<!-- Update Modal -->
@foreach ($sections as $section)
    <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">تعديل القسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateSectionForm" method="POST" action="{{ route('sections.update', $section->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updateSectionName"> {{ __('Dashboard/sections_trans.name_sections') }}</label>
                            <input type="hidden" name="id" value="{{ $section->id }}">
                            <input type="text" name="name" value="{{ $section->name }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Dashboard/sections_trans.Close') }}</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Dashboard/sections_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
