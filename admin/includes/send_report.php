<?php
$daily_report = $db_handle->runQuery("SELECT * FROM `daily_report` order by id desc");
$row_count = $db_handle->numRows("SELECT * FROM `daily_report` order by id desc");

$previous_day = date('Y-m-d', strtotime("-1 days"));
$send = true;

for ($i = 0; $i < $row_count; $i++) {
    if ($previous_day == $daily_report[$i]["day"] && $daily_report[$i]["status"] == 1) {
        $send = false;
    }
}

if ($send) {
    $order_data = $db_handle->runQuery("SELECT * FROM order_detail where date='$previous_day' order by id desc");
    $row_count = $db_handle->numRows("SELECT * FROM order_detail where date='$previous_day' order by id desc");

    $row_data = '';
    for ($i = 0; $i < $row_count; $i++) {
        $row_data .= '<tr>
                        <td>' . $order_data[$i]['id'] . '</td>
                        <td>' . $order_data[$i]['name'] . '</td>
                        <td>' . $order_data[$i]['restaurant'] . '</td>
                        <td>' . $order_data[$i]['food'] . '</td>
                        <td>HKD-' . $order_data[$i]['price'] . '</td>
                        <td>HKD-' . round($order_data[$i]['seat_number'] * $order_data[$i]['price'], 2) . '</td>
                    </tr>';
    }

    $email_to = $db_handle->notify_email();
    $subject = 'Email From Restaurants';
    $headers = "From: Restaurants <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <head>
                        <style>
                            #order_details {
                                font-family: Arial, Helvetica, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                                text-transform: capitalize;
                            }
                    
                            #order_details td, #order_details th {
                                border: 1px solid #ddd;
                                padding: 8px;
                            }
                    
                            #order_details tr:nth-child(even){background-color: #f2f2f2;}
                    
                            #order_details tr:hover {background-color: #ddd;}
                    
                            #order_details th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: left;
                                background-color: #04AA6D;
                                color: white;
                            }
                        </style>
                    </head>
                    <body style='background-color: #eee; font-size: 16px;'>
                    <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                    
                        <h3 style='color:black;text-align: center'>Here is your Daily Report</h3>
                    
                        <table id='order_details'>
                            <tr>
                                <th>
                                    Booking Number
                                </th>
                                <th>
                                    client name
                                </th>
                                <th>
                                    restaurant
                                </th>
                                <th>
                                    food set
                                </th>
                                <th>
                                    price
                                </th>
                                <th>
                                    total price
                                </th>
                            </tr>
                           $row_data
                        </table>
                    
                    </div>
                    </body>
                  </html>";

    if(mail($email_to, $subject, $messege, $headers)) {
        $insert = $db_handle->insertQuery("INSERT INTO `daily_report`(  `day`, `status`) VALUES ('$previous_day','1')");
    }
}


$monthly_report = $db_handle->runQuery("SELECT * FROM `monthly_report` order by id desc");
$row_count = $db_handle->numRows("SELECT * FROM `monthly_report` order by id desc");

$previous_month = date('Y-m', strtotime(date('Y-m') . " -1 month"));
$send = true;

for ($i = 0; $i < $row_count; $i++) {
    if ($previous_month == $monthly_report[$i]["month"] && $monthly_report[$i]["status"] == 1) {
        $send = false;
    }
}

if ($send) {
    $order_data = $db_handle->runQuery("SELECT * FROM order_detail where date like '%$previous_month%' order by id desc");
    $row_count = $db_handle->numRows("SELECT * FROM order_detail where date like '%$previous_month%' order by id desc");
    $row_data = '';
    for ($i = 0; $i < $row_count; $i++) {
        $row_data .= '<tr>
                        <td>' . $order_data[$i]['id'] . '</td>
                        <td>' . $order_data[$i]['name'] . '</td>
                        <td>' . $order_data[$i]['restaurant'] . '</td>
                        <td>' . $order_data[$i]['food'] . '</td>
                        <td>HKD-' . $order_data[$i]['price'] . '</td>
                        <td>HKD-' . round($order_data[$i]['seat_number'] * $order_data[$i]['price'], 2) . '</td>
                    </tr>';
    }

    $email_to = $db_handle->notify_email();
    $subject = 'Email From Restaurants';
    $headers = "From: Restaurants <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <head>
                        <style>
                            #order_details {
                                font-family: Arial, Helvetica, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                                text-transform: capitalize;
                            }
                    
                            #order_details td, #order_details th {
                                border: 1px solid #ddd;
                                padding: 8px;
                            }
                    
                            #order_details tr:nth-child(even){background-color: #f2f2f2;}
                    
                            #order_details tr:hover {background-color: #ddd;}
                    
                            #order_details th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: left;
                                background-color: #04AA6D;
                                color: white;
                            }
                        </style>
                    </head>
                    <body style='background-color: #eee; font-size: 16px;'>
                    <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                    
                        <h3 style='color:black;text-align: center'>Here is your Daily Report</h3>
                    
                        <table id='order_details'>
                            <tr>
                                <th>
                                    Booking Number
                                </th>
                                <th>
                                    client name
                                </th>
                                <th>
                                    restaurant
                                </th>
                                <th>
                                    food set
                                </th>
                                <th>
                                    price
                                </th>
                                <th>
                                    total price
                                </th>
                            </tr>
                           $row_data
                        </table>
                    
                    </div>
                    </body>
                  </html>";

    if(mail($email_to, $subject, $messege, $headers)){
        $insert = $db_handle->insertQuery("INSERT INTO `monthly_report`(  `month`, `status`) VALUES ('$previous_month','1')");
    }
}


