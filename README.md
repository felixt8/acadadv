# Academic Advice and Support System with NLP
Academic Advice and Support System with NLP is a system that shows all the program and courses of university, and recommending courses for students by using chatbot.

# Installation
Framework: Codeigniter<br/>
Python: 3.8 64bit
Python library: Spacy
Database: Xampp

#Setup
Place all the file in applications, views, and models in the respective codeigniter folders.

Modify content in application\config\database.php as below<br/>
$db['default'] = array(<br/>
	'dsn'	=> '',<br/>
	'hostname' => 'localhost',<br/>
	'username' => 'root',<br/>
	'password' => '',<br/>
	'database' => 'fyp',<br/>
	'dbdriver' => 'mysqli',<br/>
	'dbprefix' => '',<br/>
	'pconnect' => FALSE,<br/>
	'db_debug' => (ENVIRONMENT !== 'production'),<br/>
	'cache_on' => FALSE,<br/>
	'cachedir' => '',<br/>
	'char_set' => 'utf8',<br/>
	'dbcollat' => 'utf8_general_ci',<br/>
	'swap_pre' => '',<br/>
	'encrypt' => FALSE,<br/>
	'compress' => FALSE,<br/>
	'stricton' => FALSE,<br/>
	'failover' => array(),<br/>
	'save_queries' => TRUE<br/>
);
