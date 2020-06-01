DROP TABLE `users`;
DROP TABLE `produces`;
DROP TABLE `shoping_lists`;
DROP TABLE `statistics`;
DROP TABLE `allergens`;



CREATE TABLE users (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `isAdmin` int(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `produces` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float(50) NOT NULL,
  `season` varchar(100) NOT NULL,
  `category` varchar(200) NOT NULL,
  `diet` varchar(200) NOT NULL,
  `perisability` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shoping_lists` (
    `user_id` int(11) NOT NULL,
    `produce_id` int(11) NOT NULL,
    `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `statistics`(
    `produce_id` int(11) NOT NULL,
    `popularity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `allergens`(
    `name` varchar(200) NOT NULL,
    `produce_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `isAdmin`) VALUES
(1, 'Alin', 'Joshu','seby_bik2e@yahoo.com',  '312B6DB61A37A2F1B126FA2C7976B613765EC577AE68577FE43771C12E1CA4549E376E04C91735AC446D664636AE5EE3150E9E076E649FAD18D0302BFBCF5669', 1),
(2, 'Georgescu', 'Andrew', 'galanandy4030@yahoo.ro', '92FC29510DFACE38FB0963D1CE2C6187C4B3B945E1CC9897CCD87697B19742D21582912581318B58B3DFBC44694FC8166C5FC79D85D85F72AFB4E7ED81218C21',0),
(3, 'Sebastian', 'Cotoc','seby_cotoc2398@yahoo.com', '92FC29510DFACE38FB0963D1CE2C6187C4B3B945E1CC9897CCD87697B19742D21582912581318B58B3DFBC44694FC8166C5FC79D85D85F72AFB4E7ED81218C21',  0);


INSERT INTO `produces` (`id`, `name`, `price`, `season`, `category`, `diet`, `perisability`) VALUES
(1, 'apple', 4.50, 'fall', 'fruit', 'vegan', 'very_perisable'),
(2, 'popato', 3.50, 'fall', 'vegetable',  'vegan', 'perisable'),
(3, 'whole_chicken', 7.50, 'all', 'meat', 'gluten-free', 'perisable'),
(4, 'butter', 4.55, 'all', 'base_food', 'gluten-free', 'hardly_perrisable');

INSERT INTO `shoping_lists` (`user_id`, `produce_id`, `quantity`) VALUES
(1,1,10),
(1,2,5),
(2,1,5),
(3,2,10),
(1,3,1);

INSERT INTO `statistics` (`produce_id`, `popularity`) VALUES
(1,0),
(2,0),
(3,0);

INSERT INTO `allergens` ( `name`, `produce_id`) VALUES
('poultry',3),
('lactose',4);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `statistics`
  ADD PRIMARY KEY (`produce_id`);

ALTER TABLE `produces`
  ADD PRIMARY KEY (`id`);
  
  

