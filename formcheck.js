setInterval (function required(){
var Structureselect = document.getElementById("Cribtype");
var Structure = Structureselect.options[Structureselect.selectedIndex].value;
if (Structure == "House"){
var House-number = document.getElementById("House1").value;
var Contact-number = document.getElementById("Contact").value;
var Recipient-number = document.getElementById("Recipientname").value;
if (House-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Contact-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Recipient-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
else{
  document.getElementById("C").style.display = "block";
  document.getElementById("NC").style.display = "none";
}
}
if (Structure == "Estate"){
var Estate = document.forms["moneytree"]["Estate"].value;
var Unit-number = document.forms["moneytree"]["Unit-number"].value;
var Contact-number = document.forms["moneytree"]["Contact-number"].value;
var Recipient-number = document.forms["moneytree"]["Recipient-number"].value;
if (Estate == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Unit-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Contact-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Recipient-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
else{
  document.getElementById("C").style.display = "block";
  document.getElementById("NC").style.display = "none";
}
}
if (Structure == "Complex"){
var Complex = document.forms["moneytree"]["Complex"].value;
var Unit-number = document.forms["moneytree"]["Unit-number"].value;
var Contact-number = document.forms["moneytree"]["Contact-number"].value;
var Recipient-number = document.forms["moneytree"]["Recipient-number"].value;
if (Complex == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Unit-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Contact-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Recipient-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
else{
  document.getElementById("C").style.display = "block";
  document.getElementById("NC").style.display = "none";
}
}
if (Structure == "Flat"){
var Building = document.forms["moneytree"]["Building"].value;
var Unit-number = document.forms["moneytree"]["Unit-number"].value;
var Contact-number = document.forms["moneytree"]["Contact-number"].value;
var Recipient-number = document.forms["moneytree"]["Recipient-number"].value;
if (Building == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Unit-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Contact-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Recipient-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
else{
  document.getElementById("C").style.display = "block";
  document.getElementById("NC").style.display = "none";
}
}
if (Structure == "Office"){
var Company = document.forms["moneytree"]["Company"].value;
var Contact-number = document.forms["moneytree"]["Contact-number"].value;
var Recipient-number = document.forms["moneytree"]["Recipient-number"].value;
if (Company == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Contact-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Recipient-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
else{
  document.getElementById("C").style.display = "block";
  document.getElementById("NC").style.display = "none";
}
}
if (Structure == "Mall"){
var Mall = document.forms["moneytree"]["Mall"].value;
var Shop = document.forms["moneytree"]["Shop"].value;
var Contact-number = document.forms["moneytree"]["Contact-number"].value;
var Recipient-number = document.forms["moneytree"]["Recipient-number"].value;
if (Mall == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Shop == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Contact-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Recipient-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
else{
  document.getElementById("C").style.display = "block";
  document.getElementById("NC").style.display = "none";
}
}
if (Structure == "Shop"){
var Shop = document.forms["moneytree"]["Shop"].value;
var Contact-number = document.forms["moneytree"]["Contact-number"].value;
var Recipient-number = document.forms["moneytree"]["Recipient-number"].value;
if (Shop == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Contact-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
if (Recipient-number == ""){
  document.getElementById("NC").style.display = "block";
  document.getElementById("C").style.display = "none";
}
else{
  document.getElementById("C").style.display = "block";
  document.getElementById("NC").style.display = "none";
}
}, 1/100);

required();
