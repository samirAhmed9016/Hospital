<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createSectionForm" method="POST" action="{{ route('sections.store') }}">
                @csrf <!-- Include CSRF token for Laravel -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sectionName">Section Name</label>
                        <input type="text" class="form-control" id="sectionName" name="name"
                            placeholder="Enter section name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Section</button>
                </div>
            </form>
        </div>
    </div>
</div>
