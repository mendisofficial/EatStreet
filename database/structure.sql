CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contact_number VARCHAR(15),
    password VARCHAR(255) NOT NULL,
    gender_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE restaurants (
    restaurant_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    address VARCHAR(255),
    city VARCHAR(50),
    state VARCHAR(50),
    postal_code VARCHAR(20),
    phone_number VARCHAR(15),
    email VARCHAR(100),
    website VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO restaurants (name, description, address, city, state, postal_code, phone_number, email, website)
VALUES
    ('Restaurant 1', 'Description for Restaurant 1', '123 Main St', 'City 1', 'State 1', '12345', '123-456-7890', 'restaurant1@example.com', 'http://www.restaurant1.com'),
    ('Restaurant 2', 'Description for Restaurant 2', '456 Elm St', 'City 2', 'State 2', '23456', '987-654-3210', 'restaurant2@example.com', 'http://www.restaurant2.com'),
    ('Restaurant 3', 'Description for Restaurant 3', '789 Oak St', 'City 3', 'State 3', '34567', '555-555-5555', 'restaurant3@example.com', 'http://www.restaurant3.com'),
    ('Restaurant 4', 'Description for Restaurant 4', '321 Pine St', 'City 4', 'State 4', '45678', '111-222-3333', 'restaurant4@example.com', 'http://www.restaurant4.com'),
    ('Restaurant 5', 'Description for Restaurant 5', '654 Maple St', 'City 5', 'State 5', '56789', '999-888-7777', 'restaurant5@example.com', 'http://www.restaurant5.com'),
    ('Restaurant 6', 'Description for Restaurant 6', '987 Cedar St', 'City 6', 'State 6', '67890', '444-333-2222', 'restaurant6@example.com', 'http://www.restaurant6.com'),
    ('Restaurant 7', 'Description for Restaurant 7', '741 Birch St', 'City 7', 'State 7', '78901', '777-888-9999', 'restaurant7@example.com', 'http://www.restaurant7.com'),
    ('Restaurant 8', 'Description for Restaurant 8', '852 Walnut St', 'City 8', 'State 8', '89012', '222-111-0000', 'restaurant8@example.com', 'http://www.restaurant8.com'),
    ('Restaurant 9', 'Description for Restaurant 9', '963 Oak St', 'City 9', 'State 9', '90123', '888-777-6666', 'restaurant9@example.com', 'http://www.restaurant9.com'),
    ('Restaurant 10', 'Description for Restaurant 10', '159 Pine St', 'City 10', 'State 10', '01234', '333-444-5555', 'restaurant10@example.com', 'http://www.restaurant10.com');

CREATE TABLE menu (
    menu_id INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    is_vegetarian BOOLEAN,
    is_spicy BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(restaurant_id)
);

-- Insert menu items for Restaurant 1
INSERT INTO menu (restaurant_id, name, description, category, price, is_vegetarian, is_spicy)
VALUES
    (1, 'Spaghetti Carbonara', 'Creamy pasta with bacon and eggs.', 'Main Course', 12.99, 0, 0),
    (1, 'Caprese Salad', 'Fresh mozzarella, tomatoes, and basil.', 'Appetizer', 7.99, 1, 0),
    (1, 'Tiramisu', 'Classic Italian dessert with coffee flavor.', 'Dessert', 6.99, 0, 0),
    (1, 'Margherita Pizza', 'Tomato sauce, mozzarella, and basil.', 'Main Course', 11.99, 1, 0),
    (1, 'Bruschetta', 'Toasted bread with tomatoes and garlic.', 'Appetizer', 5.99, 1, 0);

-- Insert menu items for Restaurant 2
INSERT INTO menu (restaurant_id, name, description, category, price, is_vegetarian, is_spicy)
VALUES
    (2, 'Chicken Alfredo', 'Creamy pasta with grilled chicken.', 'Main Course', 13.99, 0, 0),
    (2, 'Caesar Salad', 'Romaine lettuce, croutons, and Caesar dressing.', 'Appetizer', 8.99, 1, 0),
    (2, 'Chocolate Cake', 'Rich chocolate cake with ganache.', 'Dessert', 7.99, 0, 0),
    (2, 'Pepperoni Pizza', 'Tomato sauce, mozzarella, and pepperoni.', 'Main Course', 12.99, 0, 1),
    (2, 'Garlic Bread', 'Toasted bread with garlic and herbs.', 'Appetizer', 5.99, 1, 0);

CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    menu_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (menu_id) REFERENCES menu(menu_id)
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Foreign key to link the order to a user
    order_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL,
    payment_method VARCHAR(255) NOT NULL,
    payment_status ENUM('pending', 'completed', 'failed') NOT NULL,
    shipping_address TEXT NOT NULL,
    -- Add more columns for other order details as needed
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL, -- Foreign key to link the item to an order
    menu_id INT NOT NULL, -- Foreign key to link the item to a menu item
    quantity INT NOT NULL,
    item_price DECIMAL(10, 2) NOT NULL,
    -- Add more columns for additional item details if needed
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (menu_id) REFERENCES menu(menu_id)
);
