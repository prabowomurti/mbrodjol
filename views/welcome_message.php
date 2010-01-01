<html>
<head>
<title>Welcome to Mbrodjol</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: "Lucida Grande", Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

.menu a {
	 font-family:"Lucida Grande", Verdana, Sans-serif;
	 font-size: 12px;
	 background-color: #efefef;
	 border: 1px solid #D0D0D0;
	 color: #002166;
	 display: block;
	 padding: 5px 10px 5px 10px;
	 margin: 5px;
	 width: 150px;
	 text-decoration:none;
	 -moz-border-radius-bottomleft: 10px;
	-moz-border-radius-bottomright: 10px;
	-moz-border-radius-topleft: 10px;
	-moz-border-radius-topright: 10px;
}

.child a {
	margin-left:30px;
	background-color: #fcfcfc;
}

.menu a:hover {
	background-color: #BCBCBC;
}

</style>
</head>
<body>

<h1>Welcome to Mbrodjol!</h1>

<p><?=anchor("http://github.com/sangprabo/mbrodjol", "Mbrodjol")?> is a simple web application developed with <a href="http://codeigniter.com">Code Igniter</a>, to manage your futsal team's stories.</p>

<p>You can:</p>
<?php
//this lines check whether the application
//has already installed or not (11 == num of tables needed)
if ($this->db->query('SHOW TABLES')->num_rows() < 10) {?>
	<code class="menu"><?=anchor("welcome/install", "Install Application");?></code>
<?php }else {?>
	<code class="menu"><?=anchor("games", "Manage Games");?></code>
	<code class="menu"><?=anchor("matches", "Manage Matches");?></code>
	<code class="menu"><?=anchor("players", "Manage Players");?></code>
	<code class="menu"><?=anchor("scorers", "View Top Scorers");?></code>
	<code class="menu"><?=anchor("places", "Manage Places/Stadium");?></code>
	<code class="menu"><?=anchor("accounts", "Balance");?></code>
		<code class="menu child"><?=anchor("accounts/history", "View Details");?></code>
		<code class="menu child"><?=anchor("accounts/payment", "Player Pays");?></code>
		<code class="menu child"><?=anchor("accounts/income", "Add Income");?></code>
		<code class="menu child"><?=anchor("accounts/outcome", "Spent Money");?></code>
	<code class="menu"><?=anchor("welcome/uninstall", '<span style="color:red">Uninstall</span>', array('onclick'=>"
						if ( confirm('Are you sure to unsintall this application ?') ) { return true;}return false;"));?></code>
<?php }//end of if ?>
		<p>We do love reading and replying emails, just send to prabowo.murti &raquo; gmail.com :)</p>
</body>
</html>
