<?php 
//By Umair
// Only run if POST request
if($_SERVER['REQUEST_METHOD'] != 'POST') {
	// @todo Maybe return JSON here so the API is consistant.
	echo "What are you doing here? You were not suppose to be here!!!\n<br />";
	return;
}

$dictionary = [
	'name' => "My name is Librar.io",
	'nice' => "Hmm, You too.",
	'anything' => "Yes, you can ask me for programming books. I am good at that! :)",
	'hi' => "Hi, How can I help you?",
	'hey' => "Hey! What you are looking for?",
	'hello' => "Hello, hope you are having good day.",
	'how' => "Wonderful as always. Thanks for asking.",
	'java' => "I suggest you book, Think Java: How to think like a computer scientist. It is written by Allen B. Downey",
	'9781491929568' => "Searched book for you using ISBN: 9781491929568, Think Java: How to think like a computer scientist. It is written by Allen B. Downey",
	'1491929561' => "I have found java book related to this ISBN: 1491929561, Think Java: How to think like a computer scientist. It is written by Allen B. Downey",
	'downey' => "Allen B. Downey has Java book, title: Think Java: How to think like a computer scientist.",
	'allen' => "Allen B. Downey has Java book, title: Think Java: How to think like a computer scientist.",
	'allen downey' => "Allen B. Downey is an American computer scientist, Professor of Computer Science at the Franklin W. Olin College of Engineering and writer of free textbooks.",
	'python' => "Here it is: Learning Python by Mark Lutz",
	'9781449355739' => "Searched book for you using ISBN: 9781449355739, Learning Python. it is written by Mark Lutz.",
	'1449355730' => "I have found java book related to this ISBN: 1449355730, Learning Python. it is written by Mark Lutz.",
	'lutz' => "Mark Lutz has Python book, Learning Python.",
	'mark' => "Mark Lutz has Python book, Learning Python.",
];

$requestBody = file_get_contents('php://input');
$json = json_decode($requestBody);
$displaySpeechMyLibrary = strtolower($json->result->parameters->DisplaySpeechMyLibrary);

$speech = array_key_exists($displaySpeechMyLibrary, $dictionary)
	? $dictionary[$displaySpeechMyLibrary]
	: "Sorry, I didnt get that. Please ask me something else.";

header('Content-type: application/json');
echo json_encode([
	'speech' => $speech,
	'displaytext' => $speech,
	'source' => 'webhook',
]);
