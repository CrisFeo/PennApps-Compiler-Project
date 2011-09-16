//Global vars.
var uploadDiv, contentsDiv, dowloadDiv;


//A wrapper for jQuery related page tasks
//(Essentialy declares use of jQuery namespace)
//---------------------------
$(function() {
//Setup the file upload plugin
initAjaxForm();

//Get a reference to the three states
uploadDiv   = $( "#fileUpload"   );
contentsDiv = $( "#fileContent"  );
downloadDiv = $( "#fileDownload" );

//Set the upload tab as initially visible
uploadDiv  .show();
contentsDiv.hide();
downloadDiv.hide();

//Add an onclick handler to compile and serve the project
$( "#content_btn" ).click(function(event){
	event.preventDefault();
	//TODO: Formulate an AJAX request to compile and rezip the output for download
	$.post("compile.php", "TODO: REQUEST DATA!", function(data) {
		//Parse the XML response to get the dl url and the compiler log
		var xmlDoc = $.parseXML(data);
		$xml = $(xmlDoc);
		var log = $xml.find("log").text();
		var url = $xml.find("url").text();
		
		$( "#compilerLog" ).html(log);
		$( "#downloadLink" ).attr("href", url);
		
	});
	
	//Hide the upload div and show the file content div
	switchStates(contentsDiv, downloadDiv);
});



});


//Initialized the Form plugin for file uploads
//---------------------------
function initAjaxForm() {
	//Set default options
	var options = { 
			target:        '#uploadResponse', // target element(s) to be updated with server response 
			success:       uploadSubmit       // post-submit callback 
			//beforeSubmit:  showRequest      // pre-submit callback 
	 
			// other available options: 
			//url:       url         // override for form's 'action' attribute 
			//type:      type        // 'get' or 'post', override for form's 'method' attribute 
			//dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
			//clearForm: true        // clear all form fields after successful submit 
			//resetForm: true        // reset the form after successful submit 
	 
			// $.ajax options can be used here too, for example: 
			//timeout:   3000
		}; 
	 
	//Bind to the upload form
	$("#uploadForm").ajaxForm(options);
}


//Called when the upload has successfully been submitted
//---------------------------
function uploadSubmit() {
	//TODO: Read response data and populate the content list
	
	//Hide the upload div and show the file content div
	switchStates(uploadDiv, contentsDiv);
}


//Hides one state, then displays the next
//---------------------------
function switchStates(cur, next) {
	cur.hide("fast", 
		function() {
			next.toggle("fast");
	});
}


//SCRATCH AREA
//===========================
//Formulate an AJAX request to upload the given file
	// and wait for a response.
	/*
	post("upload.php", "TODO: REQUEST DATA!", function(data) {
		
		
	});
	*/