<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
		$this->load->helper('url');
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}

	function install () {
		//installation process = only create several tables, orderet alphabetically
		//creating table ATTENDANCES
		$this->db->query("
CREATE TABLE IF NOT EXISTS `attendances` (
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`player_id`,`game_id`),
  KEY `FK_attendances` (`game_id`),
  CONSTRAINT `FK_attendances` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_attendances_players` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE
)
");
		//ACCOUNTS
		$this->db->query("
CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
  `amount` bigint(20) unsigned DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `account_note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
)
");

		//GAMES
		$this->db->query("
CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  KEY `FK_games` (`place_id`),
  CONSTRAINT `FK_games` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`)
)
");


		//INCOMES
		$this->db->query("
CREATE TABLE IF NOT EXISTS `incomes` (
  `income_id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(200) DEFAULT NULL,
  `income_amount` int(11) unsigned DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  PRIMARY KEY (`income_id`)
) 
");

		//MATCHES
		$this->db->query("
CREATE TABLE IF NOT EXISTS `matches` (
  `game_id` int(11) NOT NULL,
  `opponent_id` int(11) DEFAULT NULL,
  `our_goals` tinyint(3) unsigned DEFAULT NULL,
  `their_goals` tinyint(3) unsigned DEFAULT NULL,
  `game_note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  KEY `FK_matches` (`opponent_id`),
  CONSTRAINT `FK_matches` FOREIGN KEY (`opponent_id`) REFERENCES `opponents` (`opponent_id`)
)
");


		//OPPONENTS
		$this->db->query("
CREATE TABLE IF NOT EXISTS `opponents` (
  `opponent_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(50) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`opponent_id`)
)
");


		//OUTCOMES
		$this->db->query("
CREATE TABLE IF NOT EXISTS outcomes (
  `outcome_id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(200) DEFAULT NULL,
  `outcome_amount` int(10) unsigned DEFAULT NULL,
  `outcome_date` date DEFAULT '2009-12-01',
  PRIMARY KEY (`outcome_id`)
)");


		//PLACES
		$this->db->query("
 CREATE TABLE IF NOT EXISTS `places` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `stadium_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`place_id`)
)
");

		//PLAYERS
		$this->db->query("
CREATE TABLE IF NOT EXISTS `players` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `nickname` varchar(40) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`player_id`)
)
");

		//SCORERS
		$this->db->query("
CREATE TABLE IF NOT EXISTS `scorers` (
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `total_goals` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`player_id`,`game_id`),
  KEY `FK_scorers_matches` (`game_id`),
  CONSTRAINT `FK_scorers_matches` FOREIGN KEY (`game_id`) REFERENCES `matches` (`game_id`),
  CONSTRAINT `FK_scorers_players` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`)
)
");

		echo "That's it. Don't expect too much | ";
		echo anchor("", "Home Sweet Home");
	}

	function uninstall() {
		$this->db->query("
DROP TABLE
accounts, attendances, games, incomes, matches, opponents, outcomes, places, players, scorers;
"
		);
		echo "Never regret what you've done in life | ";
		echo anchor("", "Home Sweet Home");
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
