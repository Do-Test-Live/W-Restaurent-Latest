<?php
require_once('admin/includes/dbController.php');
$db_handle = new DBController();

function productCode($length)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (isset($_POST['submit'])) {

    $code =  $db_handle->checkValue(productCode(8));

    $date = $db_handle->checkValue($_POST['date']);

    $restaurant = $db_handle->checkValue($_POST['restaurant']);

    $food = $db_handle->checkValue($_POST['food']);

    $data=explode(', ', $_POST["time"]);

    $time=$data[0];

    $price=substr($data[1], strpos($data[1], "HKD-") + 4);

    $seat_number = $db_handle->checkValue($_POST['seat_number']);

    $name = $db_handle->checkValue($_POST['name']);

    $number = $db_handle->checkValue($_POST['number']);

    $email = $db_handle->checkValue($_POST['email']);

    $occasion = $db_handle->checkValue($_POST['occasion']);

    $alergies = $db_handle->checkValue($_POST['alergies']);

    $url = $_SERVER['SERVER_NAME'].'/Order-Detail?code=' . $code;

    $email_to = $email;
    $subject = 'Email From Restaurants';
    $userName = $name;
    $l = strtolower($userName);
    $u = ucfirst($l);


    $insert = $db_handle->insertQuery("INSERT INTO `order_detail`(`name`,`restaurant`,`food`, `code`, `date`, `time`, `price`, `seat_number`, `number`, `email`, `occasion`, `alergies`) VALUES ('$name','$restaurant','$food','$code','$date','$time','$price','$seat_number','$number','$email','$occasion','$alergies')");

    $headers = "From: Restaurants <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <h3 style='color:black'>Hi $u!</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>Thank you for reaching out us</p>   
                        
                            <p style='color:black'>Our team is excited to join you on your journey with us!<br>
                                We look forward to speaking with you.<br>
                                If there are any changes to your contact information or availability, please let us know by
                             </p>
                            
                            <p style='color:black;font-weight:bold'>We look forward to speaking with you!<br>
                                Restaurants Team
                            </p> 
                             <p style='color:black;text-align: center'>
                                Please Scan The QR Code edit the info
                            </p> 
                            <div style='text-align: center'>
                                <img src='https://chart.googleapis.com/chart?chof=.svg&choe=UTF-8&cht=qr&chs=300x300&chl=$url'/>
                            </div>
                        </div>
                    </body>
                </html>
                ";

    if (mail($email_to, $subject, $messege, $headers)) {
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='/';
                </script>";
    }
}
