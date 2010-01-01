<html>
	<head>
		<title>Accounts Balance</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
	<?=anchor("", "Home")?> |
	<?=anchor("accounts", "Resume")?> |
	<?=anchor('accounts/history', "View Details")?> | <?=anchor("accounts/payment", "Payments")?> |
	<?=anchor("accounts/income", "Incomes")?> |
	<?=anchor("accounts/outcome", "Outcomes")?><br />