
    // Henry Augusta Harsono
    // 1202184264
    // "dum spiro,spero" 

$('#mySelect').change(function() {
    var value = $(this).val();
});
$(document).ready(function() {
    $('#roomList').on('change', function() {

    });
    var selected = $('#roomList').prop('selectedIndex')
})

function change_image() {
    var selected = $('#roomList').prop('selectedIndex');
    var url = "";
    switch (selected) {
        case 0:
            url = "./assets/img/r-1.jpg";
            break;
        case 1:
            url = "./assets/img/r-x.jpg";
            break;
        case 2:
            url = "./assets/img/r-3.jpg";
            break
    }
    $('.roomPreview').attr("src", url);
}

