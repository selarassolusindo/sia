create view v02_bukubesar as
select
	l.idakun
    , l.Kode
    , l.Nama
    , l.Induk
    , l.Urut
    , case when m.debit is null then 0 else m.debit end as Debit
    , case when m.kredit is null then 0 else m.kredit end as Kredit
from
	t02_akun l
    left join (
        select idakun, sum(debit) as debit, sum(kredit) as kredit, induk from (

            select i.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, j.induk from (
            select g.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, h.induk from (
            select e.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, f.induk from (
            select c.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, d.induk from (
            select a.idakun, debit, kredit, induk from t03_saldoawal a left join t02_akun b on a.idakun = b.idakun) c
            left join t02_akun d on c.induk = d.idakun
            group by c.induk) e left join t02_akun f on e.induk = f.idakun
            group by e.induk) g left join t02_akun h on g.induk = h.idakun
            group by g.induk) i left join t02_akun j on i.induk = j.idakun
            where i.induk <> 0
            group by i.induk

            union

            select g.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, h.induk from (
            select e.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, f.induk from (
            select c.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, d.induk from (
            select a.idakun, debit, kredit, induk from t03_saldoawal a left join t02_akun b on a.idakun = b.idakun) c
            left join t02_akun d on c.induk = d.idakun
            group by c.induk) e left join t02_akun f on e.induk = f.idakun
            group by e.induk) g left join t02_akun h on g.induk = h.idakun
            where g.induk <> 0
            group by g.induk

            union

            select e.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, f.induk from (
            select c.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, d.induk from (
            select a.idakun, debit, kredit, induk from t03_saldoawal a left join t02_akun b on a.idakun = b.idakun) c
            left join t02_akun d on c.induk = d.idakun
            group by c.induk) e left join t02_akun f on e.induk = f.idakun
            where e.induk <> 0
            group by e.induk

            union

            select c.induk as idakun, sum(debit) as debit, sum(kredit) as kredit, d.induk from (
            select a.idakun, debit, kredit, induk from t03_saldoawal a left join t02_akun b on a.idakun = b.idakun) c
            left join t02_akun d on c.induk = d.idakun
            where c.induk <> 0
            group by c.induk

            union

            select a.idakun, debit, kredit, induk from t03_saldoawal a left join t02_akun b on a.idakun = b.idakun where induk <> 0

        ) k group by k.idakun
    ) m on l.idakun = m.idakun
