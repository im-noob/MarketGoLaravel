<!DOCTYPE html>
<html>
	<head>
		<title>Please Wait</title>
	</head>
	<body onload="document.payuform.submit();">
		<h1>Please Wait While we redirect you to payment gateway...</h1>
		<form action="https://sandboxsecure.payu.in/_payment"  name="payuform" method=POST >
			<input type="hidden" name="key" value="{{$MERCHANT_KEY}}" />
			<input type="hidden" name="hash_string" value="" />
			<input type="hidden" name="hash" value="{{$hash}}" />
			<input type="hidden" name="txnid" value="{{$txnid}}" /> 
			<input type="hidden" name="amount" value="{{$amount}}" />
			<input type="hidden" name="firstname" id="firstname" value="{{$firstname}}" />
			<input type="hidden" name="email" id="email"  value="{{$email}}" />
			<input type="hidden" name="phone" value="{{$phone}}" />
			<input type="hidden" name="productinfo" value="{{$productinfo}}"/>
			<input type="hidden" name="surl"  size="64" value="{{$surl}}" />
			<input type="hidden" name="furl"  size="64" value="{{$furl}}" />
			<input type="hidden" type="hidden" name="service_provider" value="payu_paisa" />
			<input type="hidden" type="submit" value="Submit"  />
		</form>
	</body>
</html>