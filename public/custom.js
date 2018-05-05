$(function(){
    setTimeout(function() {
        $(".notyfy .close").trigger('click');
    }, 3000);
});

/*$(function () {
    date_time_show();
    setInterval(function(){
        date_time_show();
    }, 1000);
});

function date_time_show(){
    var dates = moment().format('dddd, MMMM Do YYYY');
    var times = moment().format('h:mm:ss A');
    $('#dates_show').html(dates);
    $('#time_show').html(times);
}*/


$(function () {
    $('#search').select2({
        placeholder: "Search company ...",
        allowClear: true,
        dropdownAutoWidth : true,
        ajax: {
            url: $('#search_form').data('action'),
            data: function (params) {
                var query = {
                    search: params.term
                }
                return query;
            }
        }
    });
});


function goBack() {
    window.history.back();
}



