create view v03_sa as
select concat(idsa, idakun) as idsa, idakun, Debit, Kredit, 't03_saldoawal' as c from t03_saldoawal

union

select concat(idsa, idakun) as idsa, idakun, Debit, Kredit, 't05_saldoawalp' as c from t05_saldoawalp
