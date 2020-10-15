CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `v02_klasak2` AS
    SELECT 
        `v02_klasak`.`idakun` AS `idakun`,
        CASE
            WHEN `v02_klasak`.`KodeBB` <> '' THEN `v02_klasak`.`KodeBB`
            ELSE `v02_klasak`.`KodeBP`
        END AS `Kode`,
        `v02_klasak`.`Nama` AS `Nama`,
        `v02_klasak`.`Induk` AS `Induk`,
        `v02_klasak`.`Urut` AS `Urut`
    FROM
        `db_piw`.`v02_klasak`
    ORDER BY `v02_klasak`.`Urut`