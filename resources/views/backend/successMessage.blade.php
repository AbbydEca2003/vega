<!-- model about -->
<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-body">
            <h4 class="text-success">{!! \Session::get('success') !!}</h4>
            <h4 class="text-danger">{{$errors->first()}}</h4>
            </div>
            <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>        
    </div>
    <script src="js/adminlte.js"></script> 

    <script>
    $(document).ready(function() {
        @if (\Session::has('success') || $errors->any())
            $('#confirmation').modal('show');
        @endif
    });
</script>