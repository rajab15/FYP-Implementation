

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
        toastr.options.timeOut = 500000;
        toastr.options.positionClass = 'toast-top-right';
        toastr.error(val);
        var audio = new Audio('wake-up-sound.mp3');
        audio.play();
        
    });
}
            