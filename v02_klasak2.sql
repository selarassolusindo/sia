create view v02_klasak2 as
select
    idakun
    , case when kodebb <> '' then kodebb else kodebp end as Kode
    , Nama
    , Induk
    , Urut
from
	v02_klasak
