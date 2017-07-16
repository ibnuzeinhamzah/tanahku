CREATE TABLE pemilik_tanah ( 
    id INT(15) NOT NULL AUTO_INCREMENT, 
    nama VARCHAR(100) NOT NULL, 
    PRIMARY KEY (id)
) ENGINE = InnoDB;


ALTER TABLE pemilik_tanah ADD COLUMN alamat TEXT NULL, ADD COLUMN no_ktp VARCHAR(100);
ALTER TABLE pemilik_tanah ADD COLUMN active BOOLEAN;
    