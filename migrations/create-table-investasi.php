CREATE TABLE investasi ( 
    id INT(15) NOT NULL AUTO_INCREMENT, 
    id_investor INT(15) NOT NULL,
    id_project INT(15) NOT NULL,
    jumlah_saham INT(15) NULL,
    nilai_saham DOUBLE NULL,
    active BOOLEAN NOT NULL DEFAULT TRUE, 
    PRIMARY KEY (id)
) ENGINE = InnoDB;
