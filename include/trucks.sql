

CREATE TABLE `inventory` (
  `id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `truck_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `towing_capacity` decimal(9,2) DEFAULT NULL,
  `miles` decimal(9,2) DEFAULT NULL,
  `mpg_city` decimal(9,2) DEFAULT NULL,
  `mpg_highway` decimal(9,2) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `int_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drive_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fuel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transmission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `inventory` (`id`, `image`, `truck_name`, `price`, `towing_capacity`, `miles`, `mpg_city`, `mpg_highway`, `color`, `int_color`, `engine`, `drive_type`, `fuel`, `transmission`) VALUES
(74, 'picture-1.jpg', '2017 Kenworth T680 6x4 T/A Sleeper Truck Tractor', '73000.00', '5000.00', '38580.00', '15.00', '25.00', 'white', 'grey', '5.5', 'RWD', 'Diesel', 'Manuel'),
(75, 'picture-1.jpg', '2017 Kenworth T680 6x4 T/A Sleeper Truck Tractor', '73000.00', '5000.00', '38580.00', '15.00', '25.00', 'white', 'grey', '5.5', 'RWD', 'Diesel', 'Manuel'),
(76, '4224ee7ca66ffb14a3bfdd0e6b105c6c.jpg', '2016 Volvo VNL64T Day Cab Semi Tractor Trailer Truck', '48970.00', '0.00', '402036.00', '20.00', '30.00', 'white', 'black', '550 HP', 'AWD', 'Diesel', 'Manuel'),
(77, 'f2a1512f-37aa-4fd0-8a96-2aa842076b22.jpg', '2013 Kenworth T680 6x4 T/A Sleeper Truck Tractor', '21000.00', '12000.00', '36222.00', '15.00', '0.00', 'blue', '', '650 HP', 'Choose...', 'Diesel', 'Choose...'),
(78, 'f2a1512f-37aa-4fd0-8a96-2aa842076b22.jpg', '2013 Kenworth T680 6x4 T/A Sleeper Truck Tractor', '21000.00', '12000.00', '36222.00', '15.00', '0.00', 'blue', '', '650 HP', 'Choose...', 'Diesel', 'Choose...');


ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

