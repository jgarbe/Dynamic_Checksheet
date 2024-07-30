var urlGets = document.URL.split("?");
var variableGets = urlGets[1].split("&");
document.write("<table border=1 cellpadding=3 cellspacing = 0>");
document.write("<tr>");
document.write("<td><strong>Name</strong></td><td><strong>Value</strong></td></tr>");
	for(i = 0; i < variableGets.length; i ++) {
			document.write("<tr>");
			var pGets = variableGets[1].split("=");
			document.write("<td> + pGets[0] + "</td><td>" + unescape(pGets[1]) + "</td></tr>");
			}
document.write("</table>");

			