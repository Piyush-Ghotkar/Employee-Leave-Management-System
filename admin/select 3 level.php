<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 
 <title>3 level dynamic drop down list using javascript</title>
 
 <script language="javascript" type="text/javascript">
 <!--
 function listboxchange1(p_index) {
 
 //Clear Current options in subcategory1
 document.form1.subcategory1.options.length = 0;
 
 //Clear Current options in subcategory2
 document.form1.subcategory2.options.length = 0;
 document.form1.subcategory2.options[0] = new Option("Select Sub-Category 2", "");
 
 switch (p_index) {
 
 case "Asia":
 document.form1.subcategory1.options[0] = new Option("Select Sub-Category 1", "");
 
 document.form1.subcategory1.options[1] = new Option("India", "India");
 
 document.form1.subcategory1.options[2] = new Option("China", "China");
 break;
 
 case "Europe":
 document.form1.subcategory1.options[0] = new Option("Select Sub-Category 1", "");
 
 document.form1.subcategory1.options[1] = new Option("UK", "UK");
 
 document.form1.subcategory1.options[2] = new Option("Germany", "Germany");
 
 break;
 
 
 }
 return true;
 }
 //-->
 </script>
 
 <script language="javascript" type="text/javascript">
 <!--
 
 function listboxchange(p_index) {
 
 //Clear Current options in subcategory
 document.form1.subcategory2.options.length = 0;
 
 
 switch (p_index) {
 
 case "India":
 document.form1.subcategory2.options[0] = new Option("Select Sub-Category2", "");
 
 document.form1.subcategory2.options[1] = new Option("Chennai", "Chennai");
 
 document.form1.subcategory2.options[2] = new Option("Madurai", "Madurai");
 
 document.form1.subcategory2.options[3] = new Option("Trichi", "Trichi");
 
 break;
 
 case "China":
 document.form1.subcategory2.options[0] = new Option("Select Sub-Category2", "");
 
 document.form1.subcategory2.options[1] = new Option("Beijing", "Beijing");
 
 document.form1.subcategory2.options[2] = new Option("Shangai", "Shangai");
 
 break;
 
 case "UK":
 document.form1.subcategory2.options[0] = new Option("Select Sub-Category2", "");
 
 document.form1.subcategory2.options[1] = new Option("London", "London");
 
 document.form1.subcategory2.options[2] = new Option("Manchester", "Manchester");
 
 break;
 
 case "Germany":
 document.form1.subcategory2.options[0] = new Option("Select Sub-Category2", "");
 
 document.form1.subcategory2.options[1] = new Option("Berlin", "Berlin");
 
 document.form1.subcategory2.options[2] = new Option("Munich", "Munich");
 
 break;
 
 }
 return true;
 }
 //-->
 </script>
 
 </head>
 <body>
 <form id="form1" name="form1" method="post" action="insertarticle.asp" onsubmit="return ValidateForm(); true">
 <table width="50%" border="1" align="center" cellpadding="2" cellspacing="0">
 <tr>
 <td width="21%" align="right" valign="middle">
 <strong>Continent :</strong>
 </td>
 <td width="79%" align="left" valign="middle">
 <select name="category" id="category" onchange="javascript: listboxchange1(this.options[this.selectedIndex].value);">
 <option value="">Select Category</option>
 <option value="Asia">Asia</option>
 <option value="Europe">Europe</option>
 </select>
 </td>
 </tr>
 <tr>
 <td align="right" valign="middle">
 <strong>Countries :</strong>
 </td>
 <td align="left" valign="middle">
 
 <script type="text/javascript" language="javascript">
 <!--
 document.write('<select name="subcategory1" onChange="javascript: listboxchange(this.options[this.selectedIndex].value);"><option value="">Select Sub-Category 1</option></select>')
 -->
 </script>
 
 </td>
 </tr>
 <tr>
 <td align="right" valign="middle">
 <strong>Cities :</strong>
 </td>
 <td align="left" valign="middle">
 
 <script type="text/javascript" language="javascript">
 <!--
 document.write('<select name="subcategory2"><option value="">Select Sub-Category 2</option></select>')
 -->
 </script>
 
 </td>
 </tr>
 </table>
 </form>
 </body>
 </html>
