
CREATE TABLE IF NOT EXISTS event (
    event_id INT AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    status TINYINT NOT NULL,
    description TEXT,
    PRIMARY KEY (event_id)
)  ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS assistant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firts_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    event_id int NOT NULL,
    FOREIGN KEY fk_env(event_id)
    REFERENCES event(event_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
)  ENGINE=INNODB;