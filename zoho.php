<?php 

$auth = "75266d4350578fc2537236be16065805";

$xml = "
	<Leads>
		<row no=\"1\">
		<FL val=\"Company\">Co-Box 2</FL>
		<FL val=\"Last Name\">Phat Vu</FL>
		<FL val=\"Phone\">09 62	064</FL>
		</row>
	</Leads>
";

function insert($auth, $xml)
{
	$curl_url = "https://crm.zoho.com/crm/private/xml/Leads/insertRecords";

	$curl_post_fields = "newFormat=1&authtoken=".$auth."&scope=crmapi&xmlData=".$xml."";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 50);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_fields);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;
}

// $result = insert($auth, $xml);

// var_dump($result);


$columns = 'leads(Contact Owner)';

$data = [];
$data['selectColumns'] = $columns;
$columns = http_build_query($data);

function getRecord($auth, $columns = '')
{
	$curl_url = "https://crm.zoho.com/crm/private/json/Leads/getMyRecords?";

	$curl_url .= "authtoken=".$auth."&scope=crmapi&".$columns."";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;
}

// $result = getRecord($auth);

// var_dump($result);

/**
* Update record in CRM Zoho
*/

$xml = "
	<Leads>
		<row no=\"1\">
		<FL val=\"Company\">Co-Box 3</FL>
		<FL val=\"Last Name\">Phat Me</FL>
		<FL val=\"Phone\">09 62	064</FL>
		</row>
	</Leads>
";

$recordId = '3289518000000168018';

function updateRecord($auth, $recordId, $xml)
{
	$curl_url = "https://crm.zoho.com/crm/private/xml/Leads/updateRecords";

	$curl_post_fields = "newFormat=1&authtoken=".$auth."&scope=crmapi"."&id=".$recordId."&xmlData=".$xml."";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 100);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_fields);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;
}

// $result = updateRecord($auth, $recordId, $xml);

// var_dump($result);


/*
* Delete the record
*/
$recordId = '3289518000000168018';

function deleteRecord($auth, $recordId)
{
	$curl_url = "https://crm.zoho.com/crm/private/xml/Leads/deleteRecords?authtoken=".$auth."&scope=crmapi&id=".$recordId;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $curl_url );

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($ch, CURLOPT_HEADER, false);

	$response = curl_exec($ch);

	curl_close($ch);

	return $response;
}

// $result = deleteRecord($auth, $recordId);

// var_dump($result);

$recordId = '3289518000000168011';

$xml = "
	<Potentials>
		<row no=\"1\">
		<option val=\"createPotential\">true</option>
		<option val=\"assignTo\">sample@zoho.com</option>
		<option val=\"notifyLeadOwner\">true</option>
		<option val=\"notifyNewEntityOwner\">true</option>
		</row>
		<row no=\"2\">
		<FL val=\"Potential Name\">Hoang Hai</FL>
		<FL val=\"Closing Date\">05/30/2018</FL><FL val=\"Potential Stage\">Closed Won</FL>
		<FL val=\"Amount\">3432.23</FL>
		<FL val=\"Probability\">100</FL>
		</row>
	</Potentials>

";

function toPotential($auth, $recordId, $xml)
{
	$curl_url = "https://crm.zoho.com/crm/private/xml/Leads/convertLead";

	$curl_post_fields = "newFormat=1&authtoken=".$auth."&scope=crmapi&leadId=".$recordId."&xmlData=".$xml."";

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 50);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_fields);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;
}


// $result = toPotential($auth, $recordId, $xml);

// var_dump($result);
function getFileds($auth)
{
	$curl_url = "https://crm.zoho.com/crm/private/xml/Contacts/getFields?authtoken=".$auth."&scope=crmapi&type=2";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;

}

// $result = getFileds($auth);
// var_dump($result);


/**
* Creator Zoho
*/
$auth = 'd070a6de537e763a1e055811c6f15090';

/*
* View Record
*/
function viewRecord($auth)
{
	$curl_url = "https://creator.zoho.com/api/json/employee-management/view/All_Employees";

	$curl_url .= "?scope=creatorapi&authtoken=".$auth."&zc_ownername=aloha050992";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;

}

// $result = viewRecord($auth);
// var_dump($result);

/*
* Get spcific record
*/
$xml = "
	
";
function addRecord($auth)
{
	$curl_url = "https://creator.zoho.com/api/aloha050992/xml/employee-management/form/Add_Employee/record/add";

}



?>
<!-- 
	Add Record
 -->
<!-- <form method="POST" action="https://creator.zoho.com/api/aloha050992/json/employee-management/form/Add_Employee/record/add">
	<input type="hidden" name ="authtoken" value="<?php echo $auth; ?>">
	<input type="hidden" name ="scope" id="scope" value="creatorapi">
	<input type="text" name="Name" value="Gary">
	<input type="text" name="First_Name" value="Gar">
	<input type="text" name="Email_ID" value="vanphat_050992@yahoo.com">
	<input type="text" name="Parent_Department" value="IT">
	<input type="text" name="Department" value="KIS">
	<input type="text" name="Designation" value="Programer">

	<input type="text" name="Date_of_joining" value="29-May-2018">
	<input type="text" name="Office_Location" value="Hà Nội">
	<input type="text" name="Full_Name_with_Initial" value="May Gar">
	<textarea name="Job_Description">The Employee added by API</textarea>
	<input type="text" name="DOB" value="12-Jun-1980">
	<input type="text" name="Address" value="USA">
	<input type="text" name="Basic" value="10000">
	<input type="text" name="Hobbies" value="Reading,Writing">

	<input type="submit" value="Add Record">
</form> -->


<!-- 
	Delete record
 -->
<!-- <form method="POST" action="https://creator.zoho.com/api/aloha050992/json/employee-management/form/Add_Employee/record/delete">
	<input type="hidden" name ="authtoken" value="<?php echo $auth; ?>">
	<input type="hidden" name ="scope" id="scope" value="creatorapi">
	<input type="text" name="criteria" value="First_Name=John">

	<input type="submit" value="Delete Record">
</form> -->

<!-- 
	Edit Record
 -->
<!-- <form method="POST" action="https://creator.zoho.com/api/aloha050992/json/employee-management/form/Add_Employee/record/update">
	<input type="hidden" name ="authtoken" value="<?php echo $auth; ?>">
	<input type="hidden" name ="scope" id="scope" value="creatorapi">
	<input type="text" name="criteria" value="First_Name=Gar">

	<input type="text" name="First_Name" value="John">
	<input type="text" name="Basic" value="20000">
	<input type="text" name="Address" value="UK">

	<input type="submit" value="Update Record">
</form> -->





<?php 

/**
* View Form
*/
function viewFromAndReport($auth)
{
	$curl_url = "https://creator.zoho.com/api/json/employee-management/formsandviews";

	$curl_url .= "?scope=creatorapi&authtoken=".$auth."&zc_ownername=aloha050992";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;
}
// $result = viewFromAndReport($auth);
// var_dump($result);


/*
* Custom App
*/

/*
* View Record 
*/
function customViewRecord($auth)
{
	$curl_url = "https://creator.zoho.com/api/json/phat-sample-app/view/All_Products";

	$curl_url .= "?scope=creatorapi&authtoken=".$auth."&zc_ownername=aloha050992";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;

}

// $result = customViewRecord($auth);
// var_dump($result);




/**
* Zoho Books
* auth token: aa74916697804b5dddb975f8710364d8
* Domain url : 24h
* Redirect url : google.com 
* client id: 1000.NK1A050CL9I256473QJJVTDTVBGGX2
* fe6ac24ed1eba341277d90ec46980e3135054a6875
* refresh_code: 1000.5ab3e93490c4066d1b62e1c1cba195e7.ac9eb336f9de65a665eacaba91f20a02
*/


?>

<?php 
/*
* ZohoCRM.modules.contacts.all 1000.a31449fa52e4d738ce12f28400f31d80.20c30a36a597e19539d724a74629bf79
*/
?>

<form method="POST" action="https://accounts.zoho.com/oauth/v2/token">
	<input type="text" name ="code" value="1000.71ab9b8deb8497e04edf85fffc175b39.2f2d768b22efd35152958ef452c01d5b">
	<input type="text" name ="redirect_uri" id="scope" value="https://www.google.com/">
	<input type="text" name="client_id" value="1000.0GHSX2BXOYAQ78948ZGWYL39XENF4H">
	<input type="text" name="client_secret" value="3eeeeff7fdb0844ac01cf9d099219a91641d7f2255">
	<input type="text" name="grant_type" value="authorization_code">

	<input type="submit" value="Refresh Code">
</form>

