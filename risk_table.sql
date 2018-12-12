DROP DATABASE IF EXISTS risk_table;
CREATE DATABASE risk_table;
USE risk_table;

CREATE TABLE risks (
    riskID int NOT NULL AUTO_INCREMENT,
    riskDescription varchar(1000) NOT NULL,
    riskCategory varchar(2) NOT NULL,
    riskProbability INT(25) NOT NULL,
    riskImpact int(5) NOT NULL,
    riskInfoSheet boolean not null default 0,
    PRIMARY KEY (riskID)
);

INSERT INTO risks VALUES
("100","Best people are not available.","TE","20", "2","false"),
("101","Do the people have the right combination of skills?","TE","20", "2","false"),
("102","Technology will not meet expectations.","TE","30", "1","false"),
("103","Are enough people available?","TE","20", "4","false"),
("104","Staff turnover will be high.","TE","60", "2","false"),
("105","Are specific conventions for code documentation defined and used?","TE","50", "2","false"),
("106","Are software tools that support the software engineering process used effectively?","TE","30", "3","false"),
("107","Are product and quality metrics collected for all software projects?","TE","30", "3","false"),
("200","The right software tools are not available.","ST","20", "2","false"),
("201","Have members of the project teams received training in each of the tools?","ST","80", "3","false"),
("202","No local support for the tools used is available.","ST","50", "4","false"),
("203","Online help and documentation for the tools is unavailable or insufficient","ST","10", "4","false"),
("204","Have staff received necessary training?","ST","30", "2","false"),
("300","Negative effect of this product on company revenue?","BU","10", "1","false"),
("301","Senior management unavailable for consultation.","BU","30", "3","false"),
("302","Senior management unavailable for consultation.","BU","50", "2","false"),
("303","Number of customers who will use this product and the consistency of their needs relative to the product?","BU","40", "3","false"),
("304","Sophistication of end users?","BU","60", "3","false"),
("305","Quality of product documentation delivered to the customer does not meet expectations.","BU","10", "2","false"),
("306","Governmental constraints on the construction of the product?","BU","10", "2","false"),
("307","Late delivery resulting in extra costs for the company.","BU","10", "2","false"),
("308","Costs associated with a defective product?","BU","5", "1","false"),
("309","System and firewall will be hacked.","BU","15", "2","false"),
("400","Degree of confidence in estimated size estimate?","Ps","60", "2","false"),
("401","Product is much larger than previous systems.","Ps","10", "4","false"),
("402","A product requires a large database to function.","Ps","15", "3","false"),
("403","Larger number of users than planned for?","Ps","30", "3","false"),
("404","Number of projected changes to the requirements for the product larger than expected","Ps","70", "2","false"),
("405","Less reused software than planned?","Ps","70", "2","false"),
("500","Does the customer have a solid idea of what is required? Has the customer taken the time to write this down?","CU","70", "2","false"),
("501","Funding will be lost.","CU","40", "1","false"),
("502","Is the customer not willing to communicate and participate in reviews?","CU","15", "2","false"),
("503","Is the customer technically sophisticated in the product area?","CU","70", "3","false"),
("600","Has your organization developed or acquired a series of software engineering training courses for managers and technical staff?","Pd","20", "2","false"),
("601","Are published software engineering standards provided for every software developer and software manager?","Pd","10", "2","false"),
("602","Document outlines and examples have not been developed for all deliverables defined as part of the software process.","Pd","10", "3","false"),
("603","Are formal technical reviews of the requirements specification, design, and code conducted regularly?","Pd","20", "3","false"),
("604","Are formal technical reviews of the requirements specification, design, and code conducted regularly?","Pd","30", "3","false"),
("605","Configuration management used inefficiently to maintain consistency among system/software requirements, design, code, and test cases.","Pd","30", "3","false"),
("606","re changes to customer requirements tracked and handled correctly?","Pd","30", "2","false");

CREATE TABLE users (
    userID int NOT NULL AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    email varchar(50) NOT NULL UNIQUE,
    password varchar(20) NOT NULL,
    PRIMARY KEY (userID)
);

INSERT INTO users VALUES
("1","Jaycie","Raby","jraby@umich.edu","password"),
("2","Martin","Lohner","lohner@umich.edu","password"),
("3","Shamus","French","frenchsr@umich.edu","password"),
("4","Nour","Nassar","nnassar@umich.edu","password");

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO ts_user@localhost
IDENTIFIED BY 'pa55word';
