CREATE TABLE project ( 
    id INT(15) NOT NULL AUTO_INCREMENT, 
    nama VARCHAR(100) NOT NULL, 
    deskripsi TEXT NULL, 
    nilai DOUBLE NULL, 
    active BOOLEAN NOT NULL DEFAULT TRUE, 
    PRIMARY KEY (id)
) ENGINE = InnoDB;


ALTER TABLE project ADD COLUMN id_tanah INT(15) NOT NULL;
ALTER TABLE project ADD COLUMN slot_saham DOUBLE NULL, ADD COLUMN nilai_saham DOUBLE NULL;