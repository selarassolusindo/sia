create view v02_klasak2 as
select
    case when kodebb <> '' then idakun else concat(1000 + induk, idakun) end as idakun
    , case when kodebb <> '' then kodebb else kodebp end as Kode
    , Nama
    , Induk
    , Urut
from
	v02_klasak