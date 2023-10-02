

 setInterval (function hidePTA(){
    var City = document.getElementById('city').value;
         if (City=='Johannesburg'){
         document.getElementById("hideJHBtown").style.display = "block";           
     }else{
         document.getElementById("hideJHBtown").style.display = "none";
     }
 }, 1/100);
 
setInterval (function showJHBNorth(){
    var City = document.getElementById('city').value;
    var Town = document.getElementById('townsJHB').value;
         if (Town=='JHB North' && City=='Johannesburg'){
                 document.getElementById("hideJHBNorthsuburb").style.display = "block";
     }else{
                 document.getElementById("hideJHBNorthsuburb").style.display = "none";
     }
 }, 1/100);

setInterval (function showJHBAucklandPark(){
    var City = document.getElementById('city').value;
    var Town = document.getElementById('townsJHB').value;
    var Area = document.getElementById('suburbsJHBNorth').value;
         if (Town=='JHB North' && City=='Johannesburg' && Area=='Auckland Park'){
                 document.getElementById("hideAucklandPark").style.display = "block";
     }else{
                 document.getElementById("hideAucklandPark").style.display = "none";
     }
 }, 1/100);

setInterval (function showJHBMelville(){
    var City = document.getElementById('city').value;
    var Town = document.getElementById('townsJHB').value;
    var Area = document.getElementById('suburbsJHBNorth').value;
         if (Town=='JHB North' && City=='Johannesburg' && Area=='Melville'){
                 document.getElementById("hideMelville").style.display = "block";
     }else{
                 document.getElementById("hideMelville").style.display = "none";
     }
 }, 1/100);

setInterval (function showJHBSophiatown(){
    var City = document.getElementById('city').value;
    var Town = document.getElementById('townsJHB').value;
    var Area = document.getElementById('suburbsJHBNorth').value;
         if (Town=='JHB North' && City=='Johannesburg' && Area=='Sophiatown'){
                 document.getElementById("hideSophiatown").style.display = "block";
     }else{
                 document.getElementById("hideSophiatown").style.display = "none";
     }
 }, 1/100);

setInterval (function showJHBWestdene(){
    var City = document.getElementById('city').value;
    var Town = document.getElementById('townsJHB').value;
    var Area = document.getElementById('suburbsJHBNorth').value;
         if (Town=='JHB North' && City=='Johannesburg' && Area=='Westdene'){
                 document.getElementById("hideWestdene").style.display = "block";
     }else{
                 document.getElementById("hideWestdene").style.display = "none";
     }
 }, 1/100);

 setInterval (function showStructureAucklandPark(){
    var StreetsAucklandPark = document.getElementById('streetsAucklandPark').value;
         if (StreetsAucklandPark){
                 document.getElementById("hidecribtype").style.display = "block";
                 document.getElementById("streetsMelville").removeAttribute("required");
                 document.getElementById("streetsSophiatown").removeAttribute("required");
                 document.getElementById("streetsWestdene").removeAttribute("required");
     }
 }, 1/100);

setInterval (function showStructureMelville(){
    var StreetsMelville = document.getElementById('streetsMelville').value;
         if (StreetsMelville){
                 document.getElementById("hidecribtype").style.display = "block";
                 document.getElementById("streetsAucklandPark").removeAttribute("required");
                 document.getElementById("streetsSophiatown").removeAttribute("required");
                 document.getElementById("streetsWestdene").removeAttribute("required");
     }
 }, 1/100);

setInterval (function showStructureSophiatown(){
    var StreetsSophiatown = document.getElementById('streetsSophiatown').value;
         if (StreetsSophiatown){
                 document.getElementById("hidecribtype").style.display = "block";
                 document.getElementById("streetsAucklandPark").removeAttribute("required");
                 document.getElementById("streetsMelville").removeAttribute("required");
                 document.getElementById("streetsWestdene").removeAttribute("required");
     }
 }, 1/100);

setInterval (function showStructureWestdene(){
    var StreetsWestdene = document.getElementById('streetsWestdene').value;
         if (StreetsWestdene){
                 document.getElementById("hidecribtype").style.display = "block";
                 document.getElementById("streetsAucklandPark").removeAttribute("required");
                 document.getElementById("streetsMelville").removeAttribute("required");
                 document.getElementById("streetsSophiatown").removeAttribute("required");
     }
 }, 1/100);

setInterval (function showEstate(){
    var Estate = document.getElementById('Cribtype').value;
         if (Estate=='Estate'){
         document.getElementById("hideEstate").style.display = "block";
                 document.getElementById("Complex1").removeAttribute("required");
                 document.getElementById("Mall1").removeAttribute("required");
                 document.getElementById("Shop1").removeAttribute("required");
                 document.getElementById("Building1").removeAttribute("required");
                 document.getElementById("Company1").removeAttribute("required");
                 document.getElementById("House1").removeAttribute("required");
     }else{
         document.getElementById("hideEstate").style.display = "none";
     }
 }, 1/100);
 
 setInterval (function showComplex(){
    var Complex = document.getElementById('Cribtype').value;
         if (Complex=='Complex'){
         document.getElementById("hideComplex").style.display = "block";
                 document.getElementById("Estate1").removeAttribute("required");
                 document.getElementById("Mall1").removeAttribute("required");
                 document.getElementById("Shop1").removeAttribute("required");
                 document.getElementById("Building1").removeAttribute("required");
                 document.getElementById("Company1").removeAttribute("required");
                 document.getElementById("House1").removeAttribute("required");
     }else{
         document.getElementById("hideComplex").style.display = "none";
     }
 }, 1/100);

 setInterval (function showBuilding(){
    var Complex = document.getElementById('Cribtype').value;
         if (Complex=='Flat'){
         document.getElementById("hideBuilding").style.display = "block";
                 document.getElementById("Complex1").removeAttribute("required");
                 document.getElementById("Mall1").removeAttribute("required");
                 document.getElementById("Shop1").removeAttribute("required");
                 document.getElementById("Estate1").removeAttribute("required");
                 document.getElementById("Company1").removeAttribute("required");
                 document.getElementById("House1").removeAttribute("required");
     }else{
         document.getElementById("hideBuilding").style.display = "none";
     }
 }, 1/100);

 setInterval (function showOffice(){
    var Complex = document.getElementById('Cribtype').value;
         if (Complex=='Office'){
         document.getElementById("hideOffice").style.display = "block";
                 document.getElementById("Complex1").removeAttribute("required");
                 document.getElementById("Mall1").removeAttribute("required");
                 document.getElementById("Shop1").removeAttribute("required");
                 document.getElementById("Building1").removeAttribute("required");
                 document.getElementById("Estate1").removeAttribute("required");
                 document.getElementById("House1").removeAttribute("required");
                 document.getElementById("Unit1").removeAttribute("required");
     }else{
         document.getElementById("hideOffice").style.display = "none";
     }
 }, 1/100);

setInterval (function showMall(){
    var Complex = document.getElementById('Cribtype').value;
         if (Complex=='Mall'){
         document.getElementById("hideMall").style.display = "block";
                 document.getElementById("Complex1").removeAttribute("required");
                 document.getElementById("Estate1").removeAttribute("required");
                 document.getElementById("Shop1").removeAttribute("required");
                 document.getElementById("Building1").removeAttribute("required");
                 document.getElementById("Company1").removeAttribute("required");
                 document.getElementById("House1").removeAttribute("required");
                 document.getElementById("Unit1").removeAttribute("required");
     }else{
         document.getElementById("hideMall").style.display = "none";
     }
 }, 1/100);

setInterval (function showHouse(){
    var Complex = document.getElementById('Cribtype').value;
         if (Complex=='House'){
                 document.getElementById("Complex1").removeAttribute("required");
                 document.getElementById("Estate1").removeAttribute("required");
                 document.getElementById("Shop1").removeAttribute("required");
                 document.getElementById("Building1").removeAttribute("required");
                 document.getElementById("Company1").removeAttribute("required");
                 document.getElementById("Unit1").removeAttribute("required");
                 document.getElementById("Mall1").removeAttribute("required");
     }
 }, 1/100);

 setInterval (function showShop(){
    var Complex = document.getElementById('Cribtype').value;
         if (Complex=='Mall' || Complex=='Shop' ){
         document.getElementById("hideShop").style.display = "block";
                 document.getElementById("Complex1").removeAttribute("required");
                 document.getElementById("Mall1").removeAttribute("required");
                 document.getElementById("Estate1").removeAttribute("required");
                 document.getElementById("Building1").removeAttribute("required");
                 document.getElementById("Company1").removeAttribute("required");
                 document.getElementById("House1").removeAttribute("required");
                 document.getElementById("Unit1").removeAttribute("required");
     }else{
         document.getElementById("hideShop").style.display = "none";
     }
 }, 1/100);

 setInterval (function showNumber(){
    var Estate = document.getElementById('Cribtype').value;
         if (Estate=='Estate' || Estate=='Complex' || Estate=='Flat' ){
                 document.getElementById("hideNumber").style.display = "block";
                 document.getElementById("House1").removeAttribute("required");
     }else{
         document.getElementById("hideNumber").style.display = "none";
     }
 }, 1/100);

setInterval (function showHouseNumber(){
    var House = document.getElementById('Cribtype').value;
         if (House=='House'){
         document.getElementById("hideHouseNumber").style.display = "block";
                 document.getElementById("Unit1").removeAttribute("required");
     }else{
         document.getElementById("hideHouseNumber").style.display = "none";
     }
 }, 1/100);

 setInterval (function showContactNumber(){
    var Estate = document.getElementById('Cribtype').value;
    var House = document.getElementById('Cribtype').value;
         if (Estate=='Estate' || House=='House' || House=='Complex' || House=='Flat' || House=='Office' || House=='Mall' || House=='Shop' ){
         document.getElementById("hideContactNumber").style.display = "block";
     }else{
         document.getElementById("hideContactNumber").style.display = "none";
     }
 }, 1/100);

 setInterval (function showContactName(){
    var Estate = document.getElementById('Cribtype').value;
    var House = document.getElementById('Cribtype').value;
         if (Estate=='Estate' || House=='House' || House=='Complex' || House=='Flat' || House=='Office' || House=='Mall' || House=='Shop' ){
         document.getElementById("hideName").style.display = "block";
     }else{
         document.getElementById("hideName").style.display = "none";
     }
 }, 1/100);



 hidePTA();
 showJHBNorth();
 showJHBAucklandPark();
 showJHBMelville();
 showJHBSophiatown();
 showJHBWestdene();
 showStructureAucklandPark();
 showStructureMelville();
 showStructureSophiatown();
 showStructureWestdene();
 showEstate();
 showComplex();
 showBuilding();
 showOffice();
 showMall();
 showHouse();
 showShop();
 showNumber();
 showHouseNumber();
 showContactNumber();
 showContactName();
 
