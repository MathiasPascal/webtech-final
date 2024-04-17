-- Payment Information table
CREATE TABLE PaymentInfo (
    PaymentID INT PRIMARY KEY,
    CardNumber VARCHAR(16),
    CardHolderName VARCHAR(100),
    ExpiryDate DATE,
    CVV INT
);

-- Buyers table
CREATE TABLE Buyers (
    BuyerID INT PRIMARY KEY,
    Username VARCHAR(50),
    passwd VARCHAR(50),
    Email VARCHAR(255),
    PaymentID INT,
    FOREIGN KEY (PaymentID) REFERENCES PaymentInfo(PaymentID)
);

-- Sellers table
CREATE TABLE Sellers (
    SellerID INT PRIMARY KEY,
    Username VARCHAR(50),
    passwd VARCHAR(50),
    Email VARCHAR(255)
);

-- Products table
CREATE TABLE Products (
    ProductID INT PRIMARY KEY,
    SellerID INT,
    Name VARCHAR(100),
    Description TEXT,
    Category ENUM('Computer Boards', 'Phone Boards', 'Radio Boards', 'ICs', 'Converter Catalysts'),
    Quantity INT,
    Price DECIMAL(10,2),
    FOREIGN KEY (SellerID) REFERENCES Sellers(SellerID)
);

-- Orders table
CREATE TABLE Orders (
    OrderID INT PRIMARY KEY,
    BuyerID INT,
    ProductID INT,
    Quantity INT,
    TotalPrice DECIMAL(10,2),
    OrderDate DATE,
    FOREIGN KEY (BuyerID) REFERENCES Buyers(BuyerID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

-- Reviews table
CREATE TABLE Reviews (
    ReviewID INT PRIMARY KEY,
    BuyerID INT,
    ProductID INT,
    Rating INT,
    Comment TEXT,
    ReviewDate DATE,
    FOREIGN KEY (BuyerID) REFERENCES Buyers(BuyerID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

-- Environmental Impact table
CREATE TABLE EnvironmentalImpact (
    ImpactID INT PRIMARY KEY,
    ProductID INT,
    CarbonFootprintReduction DECIMAL(10,2),
    EnergySavings DECIMAL(10,2),
    MaterialsRecovered DECIMAL(10,2),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

-- Shopping Cart table
CREATE TABLE ShoppingCart (
    CartID INT PRIMARY KEY,
    BuyerID INT,
    ProductID INT,
    Quantity INT,
    FOREIGN KEY (BuyerID) REFERENCES Buyers(BuyerID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

