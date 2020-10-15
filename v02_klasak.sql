CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `v02_klasak` AS
    SELECT 
        `a`.`idakun` AS `idakun`,
        `a`.`KodeBB` AS `KodeBB`,
        `a`.`KodeBP` AS `KodeBP`,
        `a`.`Nama` AS `Nama`,
        `a`.`Induk` AS `Induk`,
        `a`.`Urut` AS `Urut`,
        `a`.`c` AS `c`
    FROM
        (SELECT 
            `db_piw`.`t02_akun`.`idakun` AS `idakun`,
                `db_piw`.`t02_akun`.`Kode` AS `KodeBB`,
                '' AS `KodeBP`,
                `db_piw`.`t02_akun`.`Nama` AS `Nama`,
                `db_piw`.`t02_akun`.`Induk` AS `Induk`,
                CONCAT(`db_piw`.`t02_akun`.`Urut`, '000') AS `Urut`,
                'akun' AS `c`
        FROM
            `db_piw`.`t02_akun` UNION SELECT 
            `db_piw`.`t04_akunp`.`idakun` AS `idakun`,
                '' AS `KodeBB`,
                `db_piw`.`t04_akunp`.`Kode` AS `Kode`,
                `db_piw`.`t04_akunp`.`Nama` AS `Nama`,
                `db_piw`.`t04_akunp`.`Induk` AS `Induk`,
                `db_piw`.`t04_akunp`.`Urut` AS `Urut`,
                'akunp' AS `c`
        FROM
            `db_piw`.`t04_akunp`) `a`
    ORDER BY `a`.`Urut`