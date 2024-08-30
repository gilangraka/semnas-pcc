<div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="resetModalLabel">Konfirmasi Reset Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin mereset password?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="reset-form" action="{{ route('password.reset', 'ID_PLACEHOLDER') }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function open_resetModal(id_user) {
        const form = document.getElementById('reset-form');
        form.action = form.action.replace('ID_PLACEHOLDER', id_user);
    }
</script>
