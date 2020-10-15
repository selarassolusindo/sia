CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `v02_bukubesar` AS
    SELECT 
        `l`.`idakun` AS `idakun`,
        `l`.`Kode` AS `Kode`,
        `l`.`Nama` AS `Nama`,
        `l`.`Induk` AS `Induk`,
        `l`.`Urut` AS `Urut`,
        CASE
            WHEN `m`.`debit` IS NULL THEN 0
            ELSE `m`.`debit`
        END AS `Debit`,
        CASE
            WHEN `m`.`kredit` IS NULL THEN 0
            ELSE `m`.`kredit`
        END AS `Kredit`
    FROM
        (`db_piw`.`t02_akun` `l`
        LEFT JOIN (SELECT 
            `k`.`idakun` AS `idakun`,
                SUM(`k`.`debit`) AS `debit`,
                SUM(`k`.`kredit`) AS `kredit`,
                `k`.`induk` AS `induk`
        FROM
            (SELECT 
            `i`.`induk` AS `idakun`,
                SUM(`i`.`debit`) AS `debit`,
                SUM(`i`.`kredit`) AS `kredit`,
                `j`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `g`.`induk` AS `idakun`,
                SUM(`g`.`debit`) AS `debit`,
                SUM(`g`.`kredit`) AS `kredit`,
                `h`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `e`.`induk` AS `idakun`,
                SUM(`e`.`debit`) AS `debit`,
                SUM(`e`.`kredit`) AS `kredit`,
                `f`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `c`.`induk` AS `idakun`,
                SUM(`c`.`debit`) AS `debit`,
                SUM(`c`.`kredit`) AS `kredit`,
                `d`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `a`.`idakun` AS `idakun`,
                `a`.`Debit` AS `debit`,
                `a`.`Kredit` AS `kredit`,
                `b`.`Induk` AS `induk`
        FROM
            (`db_piw`.`t03_saldoawal` `a`
        LEFT JOIN `db_piw`.`t02_akun` `b` ON (`a`.`idakun` = `b`.`idakun`))) `c`
        LEFT JOIN `db_piw`.`t02_akun` `d` ON (`c`.`induk` = `d`.`idakun`))
        GROUP BY `c`.`induk`) `e`
        LEFT JOIN `db_piw`.`t02_akun` `f` ON (`e`.`induk` = `f`.`idakun`))
        GROUP BY `e`.`induk`) `g`
        LEFT JOIN `db_piw`.`t02_akun` `h` ON (`g`.`induk` = `h`.`idakun`))
        GROUP BY `g`.`induk`) `i`
        LEFT JOIN `db_piw`.`t02_akun` `j` ON (`i`.`induk` = `j`.`idakun`))
        WHERE
            `i`.`induk` <> 0
        GROUP BY `i`.`induk` UNION SELECT 
            `g`.`induk` AS `idakun`,
                SUM(`g`.`debit`) AS `debit`,
                SUM(`g`.`kredit`) AS `kredit`,
                `h`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `e`.`induk` AS `idakun`,
                SUM(`e`.`debit`) AS `debit`,
                SUM(`e`.`kredit`) AS `kredit`,
                `f`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `c`.`induk` AS `idakun`,
                SUM(`c`.`debit`) AS `debit`,
                SUM(`c`.`kredit`) AS `kredit`,
                `d`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `a`.`idakun` AS `idakun`,
                `a`.`Debit` AS `debit`,
                `a`.`Kredit` AS `kredit`,
                `b`.`Induk` AS `induk`
        FROM
            (`db_piw`.`t03_saldoawal` `a`
        LEFT JOIN `db_piw`.`t02_akun` `b` ON (`a`.`idakun` = `b`.`idakun`))) `c`
        LEFT JOIN `db_piw`.`t02_akun` `d` ON (`c`.`induk` = `d`.`idakun`))
        GROUP BY `c`.`induk`) `e`
        LEFT JOIN `db_piw`.`t02_akun` `f` ON (`e`.`induk` = `f`.`idakun`))
        GROUP BY `e`.`induk`) `g`
        LEFT JOIN `db_piw`.`t02_akun` `h` ON (`g`.`induk` = `h`.`idakun`))
        WHERE
            `g`.`induk` <> 0
        GROUP BY `g`.`induk` UNION SELECT 
            `e`.`induk` AS `idakun`,
                SUM(`e`.`debit`) AS `debit`,
                SUM(`e`.`kredit`) AS `kredit`,
                `f`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `c`.`induk` AS `idakun`,
                SUM(`c`.`debit`) AS `debit`,
                SUM(`c`.`kredit`) AS `kredit`,
                `d`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `a`.`idakun` AS `idakun`,
                `a`.`Debit` AS `debit`,
                `a`.`Kredit` AS `kredit`,
                `b`.`Induk` AS `induk`
        FROM
            (`db_piw`.`t03_saldoawal` `a`
        LEFT JOIN `db_piw`.`t02_akun` `b` ON (`a`.`idakun` = `b`.`idakun`))) `c`
        LEFT JOIN `db_piw`.`t02_akun` `d` ON (`c`.`induk` = `d`.`idakun`))
        GROUP BY `c`.`induk`) `e`
        LEFT JOIN `db_piw`.`t02_akun` `f` ON (`e`.`induk` = `f`.`idakun`))
        WHERE
            `e`.`induk` <> 0
        GROUP BY `e`.`induk` UNION SELECT 
            `c`.`induk` AS `idakun`,
                SUM(`c`.`debit`) AS `debit`,
                SUM(`c`.`kredit`) AS `kredit`,
                `d`.`Induk` AS `induk`
        FROM
            ((SELECT 
            `a`.`idakun` AS `idakun`,
                `a`.`Debit` AS `debit`,
                `a`.`Kredit` AS `kredit`,
                `b`.`Induk` AS `induk`
        FROM
            (`db_piw`.`t03_saldoawal` `a`
        LEFT JOIN `db_piw`.`t02_akun` `b` ON (`a`.`idakun` = `b`.`idakun`))) `c`
        LEFT JOIN `db_piw`.`t02_akun` `d` ON (`c`.`induk` = `d`.`idakun`))
        WHERE
            `c`.`induk` <> 0
        GROUP BY `c`.`induk` UNION SELECT 
            `a`.`idakun` AS `idakun`,
                `a`.`Debit` AS `debit`,
                `a`.`Kredit` AS `kredit`,
                `b`.`Induk` AS `induk`
        FROM
            (`db_piw`.`t03_saldoawal` `a`
        LEFT JOIN `db_piw`.`t02_akun` `b` ON (`a`.`idakun` = `b`.`idakun`))
        WHERE
            `b`.`Induk` <> 0) `k`
        GROUP BY `k`.`idakun`) `m` ON (`l`.`idakun` = `m`.`idakun`))