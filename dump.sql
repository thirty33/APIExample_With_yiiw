
CREATE TABLE IF NOT EXISTS event (
    event_id INT AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    status TINYINT NOT NULL,
    description TEXT,
    PRIMARY KEY (event_id)
)  ENGINE=INNODB;

