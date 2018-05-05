$(function () {
    $('.table_align table th:empty').parents('tr').css('display', 'none');
});

$(function () {
    $('#prints').click(function () {
        window.print();
    });

   // window.print();
});

$(function () {
    $('#back').click(function () {
        goBack();
    });

});

function goBack() {
    window.history.back();
}
