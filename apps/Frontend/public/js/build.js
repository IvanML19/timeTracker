jQuery(document).ready(() => {

    $('#timer').click(()=> {
        $('#list-tab').hide();
        $('#timer-tab').show();
        $('#timer').removeClass('unselected-tab').addClass('selected-tab');
        $('#list').removeClass('selected-tab').addClass('unselected-tab');

    });
    $('#list').click(()=> {
        $('#list-tab').show();
        $('#timer-tab').hide();
        $('#list').removeClass('unselected-tab').addClass('selected-tab');
        $('#timer').removeClass('selected-tab').addClass('unselected-tab');


        jQuery.get("localhost:8010/timetracker", function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });

    });

});
