

function ready() {
    $(document).ready(function () {
        toastr.options.timeOut = 5000;
        toastr.options.positionClass = 'toast-top-right';
        toastr.error('Page loaded' );
        $('#linkButton').click(function () {
            toastr.success('Click button');
        });
    });
}

function display(val) {
        $(document).ready(function () {
        toastr.options.timeOut = 0;
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.closeEasing = 'swing';
        toastr.success(val, 'Prescription Time');
        var audio = new Audio('wake-up-sound.mp3');
        audio.play();
        
    });
}
            