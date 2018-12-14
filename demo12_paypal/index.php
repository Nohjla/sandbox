
<?php
session_start();

//Database Info
$host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "demoStoreNew";

$conn = mysqli_connect($host,$db_username,$db_password,$db_name);

//
if(!$conn){
	die("Connection failed: ". mysqli_error($conn));
} 

require "vendor/autoload.php";
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;


$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'ATlz2wTIFk6S5G8wtVGqgOhIW5h8YiLNvIFDofcTswl5t7CQ_nyeVrMyLSMRg3jsC_5juJbfPUDxLT3P',
		'EJdDYitYYuNt5cRCRmWLKhX2WiqyfKMJddg_fTFET7i4WhEkMcg7Rr_gq1be38LjNDCSMS4JF-L9aqM0'
	)
);

$payer = new Payer();
$payer->setPaymentMethod('paypal');


//Create array to contain indiviadual items
$items = []; //on loop: $items += [];

//Create every individual item
$indiv_item = new Item();
$indiv_item ->setName("Laptop")
			->setCurrency("PHP")
			->setQuantity(1)
			->setPrice(15000); //per item

//Add indiv_item to $items[] array
$items[] = $indiv_item;

//Create item list
$item_list  = new ItemList();
$item_list  ->setItems($items);

//Create amount
$amount = new Amount();
$amount ->setCurrency("PHP")
		->setTotal(15000); //grand total

//Create transaction
$transaction = new Transaction();
$transaction ->setAmount($amount)
			 ->setItemList($item_list)
			 ->setDescription("Transaction from your shop")
			 ->setInvoiceNumber(uniqid("demoStoreNew-"));

//where to go after\
$redirectUrls = new RedirectUrls();
$redirectUrls
	//Create successful file
	->setReturnUrl('https://localhost/sandbox/demo12_paypal/success.php')
	//Create unsuccessful file
	->setCancelUrl('https://localhost/sandbox/demo12_paypal/failed.php');

$payment = new Payment();
$payment ->setIntent("sale")
		 ->setPayer($payer)
		 ->setRedirectUrls($redirectUrls)
		 ->setTransactions([$transaction]);

try{
	$payment->create($apiContext);
}catch(Exception $e){
	die($e->getData());
}

$approvalUrl = $payment->getApprovalLink();
header('location: '.$approvalUrl);

?>