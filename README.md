# Academic Advice and Support System with NLP
Academic Advice and Support System with NLP is a system that shows all the program and courses of university, and recommending courses for students by using chatbot.

# Installation
Framework: Codeigniter<br/>
Python: 3.8 64bit<br/>
Python library: Spacy<br/>
Database: XAMPP<br/>

# Setup
Import fyp.sql in your XAMPP database server

Place all the file in application (controllers, views, and models) and public (css, img, js, Model) folder to the respective codeigniter folders.<br/>
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

Change application\models\Pipeline.php $python to your python interpreter directory<br/>
$python = '*YOUR DIRECTORY*\\python.exe';
