CREATE 
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
            `t02_akun`.`idakun` AS `idakun`,
                `t02_akun`.`Kode` AS `KodeBB`,
                '' AS `KodeBP`,
                `t02_akun`.`Nama` AS `Nama`,
                `t02_akun`.`Induk` AS `Induk`,
                CONCAT(`t02_akun`.`Urut`, '000') AS `Urut`,
                'akun' AS `c`
        FROM
            `t02_akun` UNION SELECT 
            `t04_akunp`.`idakun` AS `idakun`,
                '' AS `KodeBB`,
                `t04_akunp`.`Kode` AS `Kode`,
                `t04_akunp`.`Nama` AS `Nama`,
                `t04_akunp`.`Induk` AS `Induk`,
                `t04_akunp`.`Urut` AS `Urut`,
                'akunp' AS `c`
        FROM
            `t04_akunp`) `a`
    ORDER BY `a`.`Urut`