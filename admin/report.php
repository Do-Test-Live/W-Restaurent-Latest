<?php
require_once ('includes/dbController.php');
$db_handle=new DBController();

$previous_day = date('Y-m-d', strtotime("-1 days"));
$send = true;

if (isset($_GET['dailyReport'])) {
    $order_data = $db_handle->runQuery("SELECT * FROM order_detail where date='$previous_day' order by id desc");
    $row_count = $db_handle->numRows("SELECT * FROM order_detail where date='$previous_day' order by id desc");

    $row_data = '';
    $total=0;
    $total_seat_number=0;
    if($row_count>0){
        for ($i = 0; $i < $row_count; $i++) {
            $row_data .= '<tr>
                            <td>' . $order_data[$i]['id'] . '</td>
                            <td>' . $order_data[$i]['name'] . '</td>
                            <td>' . $order_data[$i]['restaurant'] . '</td>
                            <td>' . $order_data[$i]['food'] . '</td>
                            <td>HKD' . $order_data[$i]['price'] . '</td>
                            <td>HKD' . round($order_data[$i]['seat_number'] * $order_data[$i]['price'], 2) . '</td>
                        </tr>';
            $total+=round($order_data[$i]['seat_number'] * $order_data[$i]['price'], 2);
            $total_seat_number+=$order_data[$i]['seat_number'];
        }
    }else{
        $row_data .= "<tr>
                            <td colspan='6' style='text-align:center;'>No Result Found</td>
                        </tr>";
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
                                background-color: #0B2A97;
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
                            <tr>
                               <th>
                                   Total Order
                                </th>
                                <td>
                                    $row_count
                                </td>
                                 <th>
                                    Total Seat
                                </th>
                                <td>
                                    $total_seat_number
                                </td>
                                <th>
                                    Total Price
                                </th>
                                <td>
                                    HKD$total
                                </td>
                            </tr>
                        </table>
                    
                    </div>
                    </body>
                  </html>";

    if(mail($email_to, $subject, $messege, $headers)) {
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Import-Export';
                </script>";
    }
}



$previous_month = date('Y-m', strtotime(date('Y-m') . " -1 month"));

if (isset($_GET['monthlyReport'])) {
    $order_data = $db_handle->runQuery("SELECT * FROM order_detail where date like '%$previous_month%' order by id desc");
    $row_count = $db_handle->numRows("SELECT * FROM order_detail where date like '%$previous_month%' order by id desc");
    $row_data = '';
    $total=0;
    $total_seat_number=0;
    if($row_count>0){
        for ($i = 0; $i < $row_count; $i++) {
            $row_data .= '<tr>
                        <td>' . $order_data[$i]['id'] . '</td>
                        <td>' . $order_data[$i]['name'] . '</td>
                        <td>' . $order_data[$i]['restaurant'] . '</td>
                        <td>' . $order_data[$i]['food'] . '</td>
                        <td>HKD' . $order_data[$i]['price'] . '</td>
                        <td>HKD' . round($order_data[$i]['seat_number'] * $order_data[$i]['price'], 2) . '</td>
                    </tr>';
            $total+=round($order_data[$i]['seat_number'] * $order_data[$i]['price'], 2);
            $total_seat_number+=$order_data[$i]['seat_number'];
        }
    }else{
        $row_data .= "<tr>
                            <td colspan='6' style='text-align:center;'>No Result Found</td>
                        </tr>";
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
                                background-color: #0B2A97;
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
                            <tr>
                                <th>
                                   Total Order
                                </th>
                                <td>
                                    $row_count
                                </td>
                                 <th>
                                    Total Seat
                                </th>
                                <td>
                                    $total_seat_number
                                </td>
                                <th>
                                    Total Price
                                </th>
                                <td>
                                    HKD$total
                                </td>
                            </tr>
                        </table>
                    
                    </div>
                    </body>
                  </html>";

    if(mail($email_to, $subject, $messege, $headers)){
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Import-Export';
                </script>";
    }
}


