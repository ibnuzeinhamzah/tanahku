<?php

$this->backupSubsFont = array('dejavusanscondensed');

$this->fonttrans = array(
	'helvetica' => 'arial',
	'times' => 'timesnewroman',
	'courier' => 'couriernew',
	'trebuchet' => 'trebuchetms',
	'comic' => 'comicsansms',
	'franklin' => 'franklingothicbook',
	'albertus' => 'albertusmedium',
	'arialuni' => 'arialunicodems',
	'zn_hannom_a' => 'hannoma',
	'ocr-b' => 'ocrb',
	'ocr-b10bt' => 'ocrb',


);

$this->fontdata = array(
/* Thai fonts */
	"garuda" => array(
		'R' => "Garuda.ttf",
		'B' => "Garuda-Bold.ttf",
		'I' => "Garuda-Oblique.ttf",
		'BI' => "Garuda-BoldOblique.ttf",
		),
	"norasi" => array(
		'R' => "Norasi.ttf",
		'B' => "Norasi-Bold.ttf",
		'I' => "Norasi-Oblique.ttf",
		'BI' => "Norasi-BoldOblique.ttf",
		),

);


// Add fonts to this array if they contain characters in the SIP or SMP Unicode planes
// but you do not require them. This allows a more efficient form of subsetting to be used.
$this->BMPonly = array(
	"dejavusanscondensed",
	"dejavusans",
	"dejavuserifcondensed",
	"dejavuserif",
	"dejavusansmono",
	);

$this->sans_fonts = array('dejavusanscondensed','dejavusans','freesans','liberationsans','sans','sans-serif','cursive','fantasy', 
				'arial','helvetica','verdana','geneva','lucida','arialnarrow','arialblack','arialunicodems',
				'franklin','franklingothicbook','tahoma','garuda','calibri','trebuchet','lucidagrande','microsoftsansserif',
				'trebuchetms','lucidasansunicode','franklingothicmedium','albertusmedium','xbriyaz','albasuper','quillscript'

);

$this->serif_fonts = array('dejavuserifcondensed','dejavuserif','freeserif','liberationserif','serif',
				'timesnewroman','times','centuryschoolbookl','palatinolinotype','centurygothic',
				'bookmanoldstyle','bookantiqua','cyberbit','cambria',
				'norasi','charis','palatino','constantia','georgia','albertus','xbzar','algerian','garamond',
);

$this->mono_fonts = array('dejavusansmono','freemono','liberationmono','courier', 'mono','monospace','ocrb','ocr-b','lucidaconsole',
				'couriernew','monotypecorsiva'
);

?>