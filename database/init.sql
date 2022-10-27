create table if not exists users(
    `id` int auto_increment,
    `email` varchar(50),
    `password` varchar(50),
    `date` date
);