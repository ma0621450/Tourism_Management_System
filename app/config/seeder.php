require ("database.php");
$conn = connectDB();


//roles_table
$sql_roles = "CREATE TABLE IF NOT EXISTS `roles` (
`role_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`role_name` VARCHAR(255),
PRIMARY KEY(`role_id`)
)";
$conn->exec($sql_roles);
echo "Table roles created successfully<br>";


// inserting data into roles

$sql_insert_roles = "INSERT INTO `roles` (`role_name`) VALUES
('admin'),
('agency'),
('customer')";
$conn->exec($sql_insert_roles);
echo "Initial data inserted into roles table successfully<br>";

// users table
$sql_users = "CREATE TABLE IF NOT EXISTS `users` (
`user_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`username` VARCHAR(255),
`email` VARCHAR(255),
`password` VARCHAR(255),
`role_id` INT,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`deleted_at` TIMESTAMP NULL,
`phone_number` INT,
PRIMARY KEY(`user_id`),
FOREIGN KEY(`role_id`) REFERENCES `roles`(`role_id`)
)";
$conn->exec($sql_users);
echo "Table users created successfully<br>";

$adminPass = password_hash('admin123', PASSWORD_DEFAULT);
// Creating super_admin
$sql_create_admin = "INSERT INTO `users` (`username`, `email`, `password`, `role_id`, `phone_number`)
VALUES ('admin', 'admin@gmail.com', '$adminPass', 1, '')";

$conn->exec($sql_create_admin);

echo "Admin user created successfully<br>";



//travel agencies table

$sql_travel_agencies = "CREATE TABLE IF NOT EXISTS `travel_Agencies` (
`travel_agency_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`user_id` INT,
PRIMARY KEY(`travel_agency_id`),
FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`)
)";
$conn->exec($sql_travel_agencies);
echo "Table travel_Agencies created successfully<br>";

//customers table
$sql_customers = "CREATE TABLE IF NOT EXISTS `customers` (
`customer_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`user_id` INT,
PRIMARY KEY(`customer_id`),
FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`)
)";
$conn->exec($sql_customers);
echo "Table customers created successfully<br>";


//vp_table
$sql_vp = "CREATE TABLE IF NOT EXISTS `vp` (
`vp_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`travel_agency_id` INT,
`title` VARCHAR(255),
`description` VARCHAR(255),
`price` INT,
`start_date` DATE,
`end_date` DATE,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`deleted_at` TIMESTAMP NULL,
`persons` INT,
PRIMARY KEY(`vp_id`),
FOREIGN KEY(`travel_agency_id`) REFERENCES `travel_Agencies`(`travel_agency_id`)
)";
$conn->exec($sql_vp);
echo "Table vp created successfully<br>";

//bookings_table

$sql_bookings = "CREATE TABLE IF NOT EXISTS `bookings` (
`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`customer_id` INT,
`vacation_id` INT,
`booking_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`deleted_at` TIMESTAMP NULL,
PRIMARY KEY(`id`),
FOREIGN KEY(`customer_id`) REFERENCES `customers`(`customer_id`),
FOREIGN KEY(`vacation_id`) REFERENCES `vp`(`vp_id`)
)";
$conn->exec($sql_bookings);
echo "Table bookings created successfully<br>";

//inquiry_table
$sql_inquiry = "CREATE TABLE IF NOT EXISTS `inquiry_table` (
`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`customer_id` INT,
`subject` TEXT,
`message` TEXT,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`deleted_at` TIMESTAMP NULL,
PRIMARY KEY(`id`),
FOREIGN KEY(`customer_id`) REFERENCES `customers`(`customer_id`)
)";
$conn->exec($sql_inquiry);
echo "Table inquiry_table created successfully<br>";




//services_table
$sql_services = "CREATE TABLE IF NOT EXISTS `services` (
`service_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`description` TEXT,
PRIMARY KEY(`service_id`)
)";
$conn->exec($sql_services);
echo "Table services created successfully<br>";

//destinations_table

$sql_destinations = "CREATE TABLE IF NOT EXISTS `destinations` (
`destination_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`name` TEXT,
PRIMARY KEY(`destination_id`)
)";
$conn->exec($sql_destinations);
echo "Table destinations created successfully<br>";

//vp_info_table
$sql_vp_info = "CREATE TABLE IF NOT EXISTS `vp_info` (
`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
`vp_id` INT,
`services_id` INT,
`destination_id` INT,
PRIMARY KEY(`id`),
FOREIGN KEY(`vp_id`) REFERENCES `vp`(`vp_id`),
FOREIGN KEY(`services_id`) REFERENCES `services`(`service_id`),
FOREIGN KEY(`destination_id`) REFERENCES `destinations`(`destination_id`)
)";
$conn->exec($sql_vp_info);
echo "Table vp_info created successfully<br>";



// Query to insert destinations
$sqlDestinations = "
INSERT INTO destinations (destination_id, name)
VALUES
(1, 'Paris'),
(2, 'New York'),
(3, 'Tokyo'),
(4, 'London'),
(5, 'Rome'),
(6, 'Sydney'),
(7, 'Dubai'),
(8, 'Cairo'),
(9, 'Rio de Janeiro'),
(10, 'Moscow')
";

// Execute the query
$conn->exec($sqlDestinations);

// Query to insert services
$sqlServices = "
INSERT INTO services (service_id, description)
VALUES
(1, 'City Tour'),
(2, 'Airport Transfer'),
(3, 'Hotel Accommodation'),
(4, 'Guided Excursions'),
(5, 'Cruise Package'),
(6, 'Adventure Activities'),
(7, 'Dining Experience'),
(8, 'Shopping Tour'),
(9, 'Cultural Events'),
(10, 'Nightlife Entertainment')
";

// Execute the query
$conn->exec($sqlServices);