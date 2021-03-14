<?php

if (isset($_POST['load_dates'])) {
    $start = $_POST['start'];
    $end = date('Y-m-d', strtotime($_POST['end'] . ' +1 day'));
    $repeat = $_POST['repeat'];
    if ($repeat == 'month') {

        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1M'),
            new DateTime($end)
        );
    } else if ($repeat == 'year') {

        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1Y'),
            new DateTime($end)
        );
    } else {

        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1D'),
            new DateTime($end)
        );
    }

    if (isset($_POST['days'])) {
        $getdays = $_POST['days'];
    } else {
        $getdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    }

    $empty = array();
    $data = array();
    $time_one = date("H:i", strtotime($_POST['time_one']));
    $time_two = date("H:i", strtotime($_POST['time_two']));
    foreach ($period as $key => $value) {
        $getcurday = date('D', strtotime($value->format('Y-m-d')));
        foreach ($getdays as $getdaykey => $getdaysval) {
            if ($getdaysval == $getcurday) {
                $single = array(
                    'id' => "1",
                    'title' => $_POST['title'],
                    'description' => '<b>Time:</b><br>' . $_POST['time_one'] . ' to ' . $_POST['time_two'] . '<hr style="padding:0;margin:5px 0;"><b>Remind me:</b><br>' . $_POST['remind'] . '',
                    "start" => $value->format('Y-m-d') . ' ' . $time_one,
                    "end" => $value->format('Y-m-d') . ' ' . $time_two
                );
                $data[] = array_merge($empty, $single);
            }
        }
    }

    echo json_encode($data);
}
