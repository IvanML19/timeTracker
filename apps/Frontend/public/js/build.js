// TODO: Fix CORS problem
jQuery(document).ready(() => {
    let interval;
    let timer = {
        time: 0,
        seconds: 0,
        minutes: 0,
        hours : 0,
        reset:  () => {
            timer.time = 0;
            timer.seconds = 0;
            timer.minutes = 0;
            timer.hours = 0;
        }
    };
    //////////////////////////////////////////////////////////////////////////
    // Tabs logic
    $('#timer').click(()=> {
        fadeToggle('#list-tab', '#timer-tab');
        $('#timer').removeClass('unselected-tab').addClass('selected-tab');
        $('#list').removeClass('selected-tab').addClass('unselected-tab');
    });
    $('#list').click(()=> {
        fadeToggle('#timer-tab', '#list-tab');
        $('#list').removeClass('unselected-tab').addClass('selected-tab');
        $('#timer').removeClass('selected-tab').addClass('unselected-tab');
        $.ajax({
            type: 'GET',
            url: 'api.degustabox.local:8010/timetracker',
        }).done(function () {
            console.log('SUCCESS');
            $('#list-body').append('<tr id="random-uuid-1"><td>'+$('input[name="task"]').val()+'</td><td>'+timer.time+'</td> <td><button type="button" data-uuid="random-uuid-1" class="btn btn-danger">Delete</button></td> </tr>');
        }).fail(function (msg) {
            console.log('FAIL');
        });
    });

    // Start/stop button
    $('#start').click(() => {
        let empty = '';
        let taskName = $('input[name="task"]').val();
        if (empty.localeCompare(taskName) === 0) {
            alert('Task name field is empty');
        } else{
            $('#hours').text('0');
            $('#minutes').text('0');
            $('#seconds').text('0');

            fadeToggle('#start', '#stop');

            interval = setInterval(() => {
                timer.time++;
                timer.seconds++;
                if (timer.seconds === 60){
                    timer.seconds = 0;
                    timer.minutes++;
                }
                if (timer.minutes === 60){
                    timer.minutes = 0;
                    timer.hours++;
                }
                $('#hours').text(timer.hours);
                $('#minutes').text(timer.minutes);
                $('#seconds').text(timer.seconds);
            }, 1000);
        }
    });
    $('#stop').click(() => {
        fadeToggle('#stop', '#start');
        clearInterval(interval);
        $.ajax({
            type: 'PUT',
            url: '127.0.0.1:8010/timetracker',
            data: {
                name: $('input[name="task"]').val(),
                duration: timer.time
            },
        }).done(function () {
            alert("Information saved.");
        }).fail(function () {
            alert('Something went wrong.');
        });
        // TODO: move this logic to list (for each element received)
        $('#list-body').append('<tr id="random-uuid-1"><td>'+$('input[name="task"]').val()+'</td><td>'+timer.time+'</td> <td><button type="button" data-uuid="random-uuid-1" class="btn btn-danger">Delete</button></td> </tr>');
        //
        $('input[name="task"]').val('');
        timer.reset();
    });

    // Delete button
    $('.btn-danger').click(function() {
        let uuid = $(this).attr('data-uuid');
        $.ajax({
            type: 'DELETE',
            url: '127.0.0.1:8010/timetracker/'+uuid,
        }).done(function () {
            alert("Field deleted");
            $('#'+uuid).remove();
        }).fail(function () {
            alert('Something went wrong, please try again');
        });
        // TODO: move to done
        $('#'+uuid).remove();
    });
});

function fadeToggle($selectorOut, $selectorIn) {
    $($selectorOut).fadeOut('fast', () => {
        $($selectorIn).fadeIn('fast');
    });
}