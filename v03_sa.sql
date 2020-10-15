CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `v03_sa` AS
    SELECT 
        `t03_saldoawal`.`idsa` AS `idsa`,
        `t03_saldoawal`.`idakun` AS `idakun`,
        `t03_saldoawal`.`Debit` AS `Debit`,
        `t03_saldoawal`.`Kredit` AS `Kredit`,
        'saldoawal' AS `c`
    FROM
        `t03_saldoawal` 
    UNION SELECT 
        `t05_saldoawalp`.`idsa` AS `idsa`,
        `t05_saldoawalp`.`idakun` AS `idakun`,
        `t05_saldoawalp`.`Debit` AS `Debit`,
        `t05_saldoawalp`.`Kredit` AS `Kredit`,
        'saldoawalp' AS `c`
    FROM
        `t05_saldoawalp`