var myOffset = -2;
var currentDate = new Date();
var userOffset = currentDate.getTimezoneOffset()/60;
var timeZoneDifference = userOffset - myOffset;
currentDate.setHours(currentDate.getHours() + timeZoneDifference);

document.write(" The time and date in Central Europe is : " + currentDate.toLocaleString());

/*
var myURL = document.URL;
window.alert(myURL);
*/
/*
var categories = "Rough_ doggy_hard_pounding_gentle_tortuous";
	var screwtype = categories.split("_");
for (i = 0 ; i < screwtype.length; i++) {
	window.alert(screwtype[i]);}
*/
/*var userChoice = window.confirm(" Confirm or Cancel");
		
		
quest = (userChoice == true) ?  "Kul!" : "Well, OK then!"; 
	window.alert(quest);
	
	*/