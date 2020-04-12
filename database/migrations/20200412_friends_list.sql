create table friend_list(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id_1 INT UNSIGNED,
    user_id_2  INT UNSIGNED
);

create table friend_requests(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    requester_id INT UNSIGNED,
    receiver_id  INT UNSIGNED,
    status TINYINT(2)
);
