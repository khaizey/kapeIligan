# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases V9.2.1                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Project1.dez                                    #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2017-10-26 19:28                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Add tables                                                             #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "Bean"                                                       #
# ---------------------------------------------------------------------- #

CREATE TABLE `Bean` (
    `beansId` INTEGER NOT NULL AUTO_INCREMENT,
    `beansName` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_Bean` PRIMARY KEY (`beansId`)
);

# ---------------------------------------------------------------------- #
# Add table "rawInvent"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `rawInvent` (
    `rawInvent` INTEGER NOT NULL AUTO_INCREMENT,
    `beansId` INTEGER NOT NULL,
    `volAmount` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_rawInvent` PRIMARY KEY (`rawInvent`)
);

# ---------------------------------------------------------------------- #
# Add table "Product"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `Product` (
    `productId` INTEGER NOT NULL AUTO_INCREMENT,
    `productName` VARCHAR(40) NOT NULL,
    `productVolume` VARCHAR(40) NOT NULL,
    `productQty` VARCHAR(40) NOT NULL,
    `productPrice` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_Product` PRIMARY KEY (`productId`)
);

# ---------------------------------------------------------------------- #
# Add table "Production"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `Production` (
    `productionId` INTEGER NOT NULL AUTO_INCREMENT,
    `rawInvent` INTEGER NOT NULL,
    `volumeInput` VARCHAR(40) NOT NULL,
    `volumeOut` VARCHAR(40) NOT NULL,
    `batchName` VARCHAR(40) NOT NULL,
    `productDate` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_Production` PRIMARY KEY (`productionId`)
);

# ---------------------------------------------------------------------- #
# Add table "Customer"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `Customer` (
    `customerId` INTEGER NOT NULL AUTO_INCREMENT,
    `cosLastname` VARCHAR(40) NOT NULL,
    `cosFirstname` VARCHAR(40) NOT NULL,
    `birthDate` VARCHAR(40) NOT NULL,
    `address` VARCHAR(40) NOT NULL,
    `contactNum` VARCHAR(40) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_Customer` PRIMARY KEY (`customerId`)
);

# ---------------------------------------------------------------------- #
# Add table "accntsPayable"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `accntsPayable` (
    `accntsId` INTEGER NOT NULL AUTO_INCREMENT,
    `debtQty` VARCHAR(40) NOT NULL,
    `debtDate` VARCHAR(40) NOT NULL,
    `debtPayment` VARCHAR(40) NOT NULL,
    `customerId` INTEGER NOT NULL,
    `productId` INTEGER NOT NULL,
    CONSTRAINT `PK_accntsPayable` PRIMARY KEY (`accntsId`)
);

# ---------------------------------------------------------------------- #
# Add table "Mix"                                                        #
# ---------------------------------------------------------------------- #

CREATE TABLE `Mix` (
    `mixId` INTEGER NOT NULL AUTO_INCREMENT,
    `productionId` INTEGER NOT NULL,
    `productId` INTEGER NOT NULL,
    `mixVolume` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_Mix` PRIMARY KEY (`mixId`)
);

# ---------------------------------------------------------------------- #
# Add foreign key constraints                                            #
# ---------------------------------------------------------------------- #

ALTER TABLE `rawInvent` ADD CONSTRAINT `Bean_rawInvent` 
    FOREIGN KEY (`beansId`) REFERENCES `Bean` (`beansId`);

ALTER TABLE `Mix` ADD CONSTRAINT `Production_Mix` 
    FOREIGN KEY (`productionId`) REFERENCES `Production` (`productionId`);

ALTER TABLE `Mix` ADD CONSTRAINT `Product_Mix` 
    FOREIGN KEY (`productId`) REFERENCES `Product` (`productId`);

ALTER TABLE `Production` ADD CONSTRAINT `rawInvent_Production` 
    FOREIGN KEY (`rawInvent`) REFERENCES `rawInvent` (`rawInvent`);

ALTER TABLE `accntsPayable` ADD CONSTRAINT `Customer_accntsPayable` 
    FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`);

ALTER TABLE `accntsPayable` ADD CONSTRAINT `Product_accntsPayable` 
    FOREIGN KEY (`productId`) REFERENCES `Product` (`productId`);
