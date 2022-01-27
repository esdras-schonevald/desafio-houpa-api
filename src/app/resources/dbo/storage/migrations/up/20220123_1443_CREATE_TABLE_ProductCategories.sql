  CREATE TABLE IF NOT EXISTS
  ProductCategories (
    ProductID   INT NOT NULL
  , CategoryID  INT NOT NULL

  , CONSTRAINT FK_ProductPC FOREIGN KEY (ProductID) REFERENCES Products(ID)
  , CONSTRAINT FK_CategoryPC FOREIGN KEY (CategoryID) REFERENCES Categories(ID)
  );