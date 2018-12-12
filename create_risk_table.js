var risksArray = [
  {riskID: "100", riskDescription: "Best people are not available.", Category: "TE", Probability: "20", Impact: "2", ris: "false"},
  {riskID: "101", riskDescription: "Do the people have the right combination of skills?", Category: "TE", Probability: "20", Impact: "2", ris: "false"},
  {riskID: "102", riskDescription: "Technology will not meet expectations.", Category: "TE", Probability: "30", Impact: "1", ris: "false"},
  {riskID: "103", riskDescription: "Are enough people available?", Category: "TE", Probability: "20", Impact: "4", ris: "false"},
  {riskID: "104", riskDescription: "Staff turnover will be high.", Category: "TE", Probability: "60", Impact: "2", ris: "false"},
  {riskID: "105", riskDescription: "Are specific conventions for code documentation defined and used?", Category: "TE", Probability: "50", Impact: "2", ris: "false"},
  {riskID: "106", riskDescription: "Are software tools that support the software engineering process used effectively?", Category: "TE", Probability: "30", Impact: "3", ris: "false"},
  {riskID: "107", riskDescription: "Are product and quality metrics collected for all software projects?", Category: "TE", Probability: "30", Impact: "3", ris: "false"},
  {riskID: "200", riskDescription: "The right software tools are not available.", Category: "ST", Probability: "20", Impact: "2", ris: "false"},
  {riskID: "201", riskDescription: "Have members of the project teams received training in each of the tools?", Category: "ST", Probability: "80", Impact: "3", ris: "false"},
  {riskID: "202", riskDescription: "No local support for the tools used is available.", Category: "ST", Probability: "50", Impact: "4", ris: "false"},
  {riskID: "203", riskDescription: "Online help and documentation for the tools is unavailable or insufficient", Category: "ST", Probability: "10", Impact: "4", ris: "false"},
  {riskID: "204", riskDescription: "Have staff received necessary training?", Category: "ST", Probability: "30", Impact: "2", ris: "false"},
  {riskID: "300", riskDescription: "Negative effect of this product on company revenue?", Category: "BU", Probability: "10", Impact: "1", ris: "false"},
  {riskID: "301", riskDescription: "Senior management unavailable for consultation.", Category: "BU", Probability: "30", Impact: "3", ris: "false"},
  {riskID: "302", riskDescription: "Senior management unavailable for consultation.", Category: "BU", Probability: "50", Impact: "2", ris: "false"},
  {riskID: "303", riskDescription: "Number of customers who will use this product and the consistency of their needs relative to the product?", Category: "BU", Probability: "40", Impact: "3", ris: "false"},
  {riskID: "304", riskDescription: "Sophistication of end users?", Category: "BU", Probability: "60", Impact: "3", ris: "false"},
  {riskID: "305", riskDescription: "Quality of product documentation delivered to the customer does not meet expectations.", Category: "BU", Probability: "10", Impact: "2", ris: "false"},
  {riskID: "306", riskDescription: "Governmental constraints on the construction of the product?", Category: "BU", Probability: "10", Impact: "2", ris: "false"},
  {riskID: "307", riskDescription: "Late delivery resulting in extra costs for the company.", Category: "BU", Probability: "10", Impact: "2", ris: "false"},
  {riskID: "308", riskDescription: "Costs associated with a defective product?", Category: "BU", Probability: "5", Impact: "1", ris: "false"},
  {riskID: "309", riskDescription: "System and firewall will be hacked.", Category: "BU", Probability: "15", Impact: "2", ris: "false"},
  {riskID: "400", riskDescription: "Degree of confidence in estimated size estimate?", Category: "Ps", Probability: "60", Impact: "2", ris: "false"},
  {riskID: "401", riskDescription: "Product is much larger than previous systems.", Category: "Ps", Probability: "10", Impact: "4", ris: "false"},
  {riskID: "402", riskDescription: "A product requires a large database to function.", Category: "Ps", Probability: "15", Impact: "3", ris: "false"},
  {riskID: "403", riskDescription: "Larger number of users than planned for?", Category: "Ps", Probability: "30", Impact: "3", ris: "false"},
  {riskID: "404", riskDescription: "Number of projected changes to the requirements for the product larger than expected", Category: "Ps", Probability: "70", Impact: "2", ris: "false"},
  {riskID: "405", riskDescription: "Less reused software than planned?", Category: "Ps", Probability: "70", Impact: "2", ris: "false"},
  {riskID: "500", riskDescription: "Does the customer have a solid idea of what is required? Has the customer taken the time to write this down?", Category: "CU", Probability: "70", Impact: "2", ris: "false"},
  {riskID: "501", riskDescription: "Funding will be lost.", Category: "CU", Probability: "40", Impact: "1", ris: "false"},
  {riskID: "502", riskDescription: "Is the customer not willing to communicate and participate in reviews?", Category: "CU", Probability: "15", Impact: "2", ris: "false"},
  {riskID: "503", riskDescription: "Is the customer technically sophisticated in the product area?", Category: "CU", Probability: "70", Impact: "3", ris: "false"},
  {riskID: "600", riskDescription: "Has your organization developed or acquired a series of software engineering training courses for managers and technical staff?", Category: "Pd", Probability: "20", Impact: "2", ris: "false"},
  {riskID: "601", riskDescription: "Are published software engineering standards provided for every software developer and software manager?", Category: "Pd", Probability: "10", Impact: "2", ris: "false"},
  {riskID: "602", riskDescription: "Document outlines and examples have not been developed for all deliverables defined as part of the software process.", Category: "Pd", Probability: "10", Impact: "3", ris: "false"},
  {riskID: "603", riskDescription: "Are formal technical reviews of the requirements specification, design, and code conducted regularly?", Category: "Pd", Probability: "20", Impact: "3", ris: "false"},
  {riskID: "604", riskDescription: "Are formal technical reviews of the requirements specification, design, and code conducted regularly?", Category: "Pd", Probability: "30", Impact: "3", ris: "false"},
  {riskID: "605", riskDescription: "Configuration management used inefficiently to maintain consistency among system/software requirements, design, code, and test cases.", Category: "Pd", Probability: "30", Impact: "3", ris: "false"},
  {riskID: "606", riskDescription: "re changes to customer requirements tracked and handled correctly?", Category: "Pd", Probability: "30", Impact: "2", ris: "false"},
];

function predefinedRiskTable(){
  var myTable2 = document.getElementById("myTable2");

}

function findIndexByKeyValue(array, key, search) {
  for (var index = 0; index < array.length; index++) {
    if (array[index][key] == search){
      return index;
    }
  }
  return null;
  }

function getRisk(key){
  var index = findIndexByKeyValue(risksArray, "riskID", key); //get index of riskID defined by user

  // Collect all associated data with specified riskID
  var riskDescription = risksArray[index]["riskDescription"];
  var category = risksArray[index]["category"];
  var probability = risksArray[index]["probability"];
  var impact = risksArray[index]["impact"];
  var ris = risksArray[index]["ris"];

}

function createRiskTable(){
  // create new array to hold user input in table on user interface
  var userArray = [];


}

function addRisk(){
 // add risk to new array defined in createRiskTable()

}

function deleteRisk(index){
 // delete risk from new array defined in createRiskTable()
 document.getElementById("myTable1").deleteRow(index);
}

function sortByImpact(){
 // sort new array in createRiskTable() by impact values
}

function sortByProbability(){
 // sort new array in createRiskTable() by probability values
}

function clearAllEntries(){ //working
  location.reload();
}
