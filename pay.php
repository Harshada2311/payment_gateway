<?php 
$purpose ="DONATION";
//$product_name = $_POST["product_name"];
//$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$amount = $_POST["Amount"];




include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_76830de648c7cce2cc2ffb956ce', 'test_2aa4b91d83f750f90e754fc9544','https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://harshadashinde.000webhostapp.com/project/thankyou.php",
        "webhook" => "http://harshadashinde.000webhostapp.com/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>