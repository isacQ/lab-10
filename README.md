# lab-10
Tulgarsan asuudluud:
1. javascript php hoyriig hoorond ni holbohod asuudal tulgarc baisan teriig olon oroldsonii etsest ucriig olj cadsan
2. hereglegchees utga avaad tuhain utgiig jsiig damjaad php-d oruulhad asuudaltai baisan ba butsaj avhad mon asuudaltai baisan
3. Search hiisnii daraa detailiig haruulhad asuudal uuseed detail heseg haragdahgui baigaag zasj branch1-d oruulav
4. Search Detail tus tusdaa ajilj baigaac holboj cadahgui baigaag zasj branch1 bolgon oruulav
5. Ur dung aguulsan screenshotuudiig branch1 d commit hiile
CREATE TABLE Items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    category_id INT,
    price DECIMAL(10,2),
    purchase_date DATE,
    description TEXT,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
);
CREATE TABLE Uses (
    use_id INT AUTO_INCREMENT PRIMARY KEY,
    use_description TEXT NOT NULL
);
-- Inserting data into Categories table
INSERT INTO Categories (category_name) VALUES
    ('Kitchen Appliances'),
    ('Furniture'),
    ('Cleaning Supplies'),
    ('Electronics'),
    ('Bedding'),
    ('Home Decor'),
    ('Tools'),
    ('Outdoor');

-- Inserting data into Uses table
INSERT INTO Uses (use_description) VALUES
    ('Cooking'),
    ('Entertainment'),
    ('Cleaning'),
    ('Comfort'),
    ('Sleeping'),
    ('Decoration'),
    ('DIY'),
    ('Outdoor Activities');

-- Inserting data into Items table
-- Generating random prices for demonstration purposes
-- You may need to adjust the actual data based on your requirements

-- Use a loop to insert about 100 items
DELIMITER //

CREATE PROCEDURE InsertSampleData()
BEGIN
    DECLARE counter INT DEFAULT 0;
    
    WHILE counter < 100 DO
        INSERT INTO Items (item_name, category_id, price, purchase_date, description)
        VALUES (
            CONCAT('Item', counter + 1),
            ROUND(RAND() * 7) + 1,
            ROUND(RAND() * 1000, 2),
            DATE_ADD('2022-01-01', INTERVAL ROUND(RAND() * 700) DAY),
            CONCAT('Description for Item', counter + 1)
        );
        
        SET counter = counter + 1;
    END WHILE;
END //

DELIMITER ;

-- Call the procedure to insert sample data
CALL InsertSampleData();

-- Drop the procedure after data insertion
DROP PROCEDURE InsertSampleData;
