#adatbazis
  CREATE DATABASE ciposhop
	CHARACTER SET utf8
	COLLATE utf8_hungarian_ci;
#T�bl�k k�sz�t�se
  CREATE TABLE ciposhop.cipo (
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Nev VARCHAR(50) NOT NULL,
  TipusId INT(11) NOT NULL,
  SzinId INT(11) NOT NULL,
  MarkaId INT(11) NOT NULL,
  MeretId INT(11) NOT NULL,
  Leiras VARCHAR(255) NOT NULL,
  Netto DECIMAL(10, 2) NOT NULL,
  AfaKulcs DECIMAL(10, 2) NOT NULL,
  Kep VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (Id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

CREATE TABLE ciposhop.users (
  userId INT(11) NOT NULL AUTO_INCREMENT,
  userName VARCHAR(255) NOT NULL,
  email VARCHAR(60) NOT NULL,
  password VARCHAR(100) NOT NULL,
  accessLevel INT(11) NOT NULL,
  PRIMARY KEY (userId)
)

CREATE TABLE ciposhop.tipus (
  TipusId INT(11) NOT NULL AUTO_INCREMENT,
  Tipus VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (TipusId)
)
ENGINE = INNODB;

CREATE TABLE ciposhop.meretek (
  MeretId INT(11) NOT NULL AUTO_INCREMENT,
  Meret VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (MeretId)
)
ENGINE = INNODB;

CREATE TABLE ciposhop.cipomeretek (
  Id INT(11) NOT NULL AUTO_INCREMENT,
  MeretId INT(11) NOT NULL,
  PRIMARY KEY (Id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

CREATE TABLE ciposhop.szinek (
  SzinId INT(11) NOT NULL AUTO_INCREMENT,
  Szin VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (SzinId)
)
ENGINE = INNODB;

CREATE TABLE ciposhop.marka (
  MarkaId INT(11) NOT NULL AUTO_INCREMENT,
  Marka VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (MarkaId)
)
ENGINE = INNODB;

ALTER TABLE ciposhop.cipo 
  ADD CONSTRAINT FK_cipo_marka_MarkaId FOREIGN KEY (MarkaId)
    REFERENCES ciposhop.marka(MarkaId) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ciposhop.cipo 
  ADD CONSTRAINT FK_cipo_meretek_MeretId FOREIGN KEY (MeretId)
    REFERENCES ciposhop.meretek(MeretId) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ciposhop.cipo 
  ADD CONSTRAINT FK_cipo_szinek_SzinId FOREIGN KEY (SzinId)
    REFERENCES ciposhop.szinek(SzinId) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ciposhop.cipo 
  ADD CONSTRAINT FK_cipo_tipus_TipusId FOREIGN KEY (TipusId)
    REFERENCES ciposhop.tipus(TipusId) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ciposhop.cipomeretek 
  ADD CONSTRAINT FK_cipomeretek_cipo_Id FOREIGN KEY (Id)
    REFERENCES ciposhop.cipo(Id) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ciposhop.cipomeretek 
  ADD CONSTRAINT FK_cipomeretek_meretek_MeretId FOREIGN KEY (MeretId)
    REFERENCES ciposhop.meretek(MeretId) ON DELETE NO ACTION ON UPDATE NO ACTION;

#Adatok
#---------
delete from cipomeretek;
  delete from cipo;
delete from meretek;
delete from marka;
delete from tipus;
delete from szinek;


  INSERT into szinek
    VALUES
    (1,'Fekete'),
    (2,'R�zsasz�n'),
    (3,'Feh�r'),
    (4,'Sz�rke'),
    (5,'Barna'),
    (6,'Piros'),
    (7,'Narancss�rga'),
    (8,'K�k'),
    (9,'Bord�')
  ;

  INSERT into meretek
    VALUES
    (1,'23'),
    (2,'24'),
    (3,'25'),
    (4,'26'),
    (5,'27'),
    (6,'28'),
    (7,'29'),
    (8,'30'),
    (9,'31'),
    (10,'32'),
    (11,'33'),
    (12,'34'),
    (13,'35'),
    (14,'36'),
    (15,'37'),
    (16,'38'),
    (17,'39'),
    (18,'40'),
    (19,'41'),
    (20,'42'),
    (21,'43'),
    (22,'44');


  INSERT into tipus
    VALUES
    (1,'Sportcip�'),
    (2,'Bakancs'),
    (3,'Csizma'),
    (4,'Szand�l');

  INSERT into marka
    VALUES
    (1,'Newfeel'),
    (2,'Domyos'),
    (3,'Artengo'),
    (4,'Solognac'),
    (5,'Kalenji'),
    (6,'Quechua'),
    (7,'Fouganza'),
    (8,'Forclaz'),
    (9,'Merrel'),
    (10,'Columbia')
  ;

   INSERT into cipo
    VALUES
    (1,'Newfeel sportcip�',1,1,1,'A gyerekek l�ba �lland� n�v�sben van, �gy term�szetes, hogy l�bfej�k lapos. A talpboltozatot nem szabad megemelni: a gyerek l�ba deform�l�dhat �s h�tf�j�st okozhat! Hagyni kell, hogy a gyerek l�ba saj�t �tem�ben fejl�dj�n, er�s�dj�n.',3000,0.27,'Newfeel_sportcipo_fekete.png'),
    (2,'Newfeel sportcip�',1,2,1,'A gyerekek l�ba �lland� n�v�sben van, �gy term�szetes, hogy l�bfej�k lapos. A talpboltozatot nem szabad megemelni: a gyerek l�ba deform�l�dhat �s h�tf�j�st okozhat! Hagyni kell, hogy a gyerek l�ba saj�t �tem�ben fejl�dj�n, er�s�dj�n.',3000,0.27,'Newfeel_sportcipo_rozsszin.png'),
    (3,'Artengo sportcip�',1,3,3,'Gyerekek sz�m�ra kifejlesztett sportcip� a tenisszel val� ismerked�shez vagy alkalomszer� teniszez�shez �s iskolai sportol�shoz b�rmilyen p�lyabor�t�sra.',2500,0.27,'Artego_sportcipo_feher.png'),
    (4,'Artengo sportcip�',1,1,3,'Gyerekek sz�m�ra kifejlesztett sportcip� a tenisszel val� ismerked�shez vagy alkalomszer� teniszez�shez �s iskolai sportol�shoz b�rmilyen p�lyabor�t�sra.',2500,0.27,'Artego_sportcipo_fekete.png'),
    (5,'Solognac sportcip�',1,5,4,'Mindenfajta vad�szathoz sz�raz id�ben, m�rs�kelten technik�s terepre �s kev�sb� t�sk�s/t�vises n�v�nyzetben.',5990,0.27,'Solognac_sportcipo_barna.png'),
    (6,'Kalenji sportcip�',1,2,5,'K�nny� fut�cip� j� �t�scsillap�t�ssal alkalmank�nti fut�shoz, heti 10 km-ig.',5990,0.27,'Kalenji_sportcipo_rozsszin.png'),
    (7,'Kalenji sportcip�',1,7,5,'K�nny� fut�cip� j� �t�scsillap�t�ssal alkalmank�nti fut�shoz, heti 10 km-ig.',5990,0.27,'Kalenji_sportcipo_narancssarga.png'),
    (8,'Domyos sportcip�',1,1,2,'Azoknak, akik most kezdik az edz�termi edz�st.',5990,0.27,'Domyos_sportcipo_fekete.png'),
    (9,'Quechua bakancs',2,1,6,'Alkalmank�nti t�r�z�shoz s�kon, erd�ben vagy tengerparton, sz�raz id�ben.',4990,0.27,'Quechua_bakancs_fekete.png'),
    (10,'Fouganza bakancs',2,5,7,'K�z�phalad� lovasoknak. Ide�lis viselet terep,- �s t�ralovagl�shoz, n�gy�vszakos viselet.',24990,0.27,'Fouganza_bakancs_barna.png'),
    (11,'Forclaz bakancs',2,5,8,'V�zhatlan, k�nyelmes bakancs k�nny� terepre, j�l tartja a l�bat.',24990,0.27,'Forclaz_bakancs_barna.png'),
    (12,'Solognac csizma',3,6,4,'Mindenfajta k�lt�ri tev�kenys�ghez es�s id�ben.',2990,0.27,'Solognac_csizma_piros.png'),
    (13,'Solognac csizma',3,8,4,'Mindenfajta k�lt�ri tev�kenys�ghez es�s id�ben.',2990,0.27,'Solognac_csizma_kek.png'),
    (14,'Fouganza csizma',3,1,7,'Eleg�ns, b�rhat�s� lovagl�csizma k�z�phalad� lovasoknak.',19990,0.27,'Fouganza_csizma_fekete.png'),
    (15,'Merrel szand�l',4,1,9,'Rendszeres gyalogl�shoz vagy utaz�shoz.',19990,0.27,'Merrel_szandal_fekete.png'),
    (16,'Quechua szand�l',4,9,6,'Tervez�csapatunk ezt a b�r szand�lt meleg �s sz�raz id�ben s�k terepen vagy v�zparton t�rt�n� alkalmank�nti kir�ndul�shoz fejlesztette ki.',7990,0.27,'Quechua_szandal_bordo.png'),
    (17,'Columbia szand�l',4,4,10,'Columbia szand�l ny�ri kir�ndul�shoz enyh�n dombos terepen.',19990,0.27,'Columbia_szandal_szurke.png')
  ;
  INSERT INTO cipomeretek
    VALUES
    (1,4),
    (1,5),
    (1,6),
    (1,9),
    (2,4),
    (2,7),
    (2,8),
    (2,9),
    (3,4),
    (3,5),
    (3,7),
    (3,8),
    (4,11),
    (4,15),
    (4,17),
    (4,16),
    (5,16),
    (5,17),
    (5,18),
    (5,20),
    (6,16),
    (6,18),
    (6,20),
    (6,21),
    (7,15),
    (7,16),
    (7,17),
    (7,18),
    (8,12),
    (8,15),
    (8,16),
    (8,17),
    (9,17),
    (9,19),
    (9,20),
    (9,22),
    (10,17),
    (10,18),
    (10,19),
    (10,20),
    (11,11),
    (11,12),
    (11,15),
    (11,17),
    (12,9),
    (12,15),
    (12,14),
    (12,16),
    (13,13),
    (13,14),
    (13,15),
    (13,16),
    (14,16),
    (14,17),
    (14,19),
    (14,21),
    (15,15),
    (15,16),
    (15,18),
    (15,20),
    (16,11),
    (16,13),
    (16,14),
    (16,15),
    (17,16),
    (17,19),
    (17,20),
    (17,21);

select * from tipus;
select * from meretek;
select * from cipomeretek;
select * from szinek;
select * from marka;
select * FROM cipo;

call ciposhopgen();

select * from users;

INSERT INTO users
  (userId, userName, email, password, accessLevel)
  VALUES
  (1, 'admin', 'admin@ab.hu', '$2y$10$aGzneJwL98RbhzIzJUsJTeYG053v4Dx6TKfja6M6wkLXJbCG9d2I.', 1), #admin
  (2, 'test', 'test@ab.hu', '$2y$10$lhjNktYlWbQn42Q6dfIQBOJwGm5gsfdExQpKK1R6w247WQ/sQK48S',2); #jelszo

#Lek�rdez�sek
#------------------------
#TipusTabla
select * from tipus;
#MeretTabla
select * from meretek;

#SzinekTabla
select * from szinek;

#MarkaTabla
select * from marka;

#CipoTabla
select c.Id,c.Nev,t.TipusId,t.Tipus,sz.SzinId,sz.Szin,ma.MarkaId,ma.Marka,c.Leiras,c.Netto,c.AfaKulcs,c.Kep from cipo c
    inner join tipus t on c.TipusId = t.TipusId
    inner join szinek sz on sz.SzinId = c.SzinId
  inner join marka ma on ma.MarkaId = c.MarkaId
;
#CipoMeretTabla
  select cp.Id,c.Nev,m.MeretId,m.Meret from meretek m
    inner join cipomeretek cp on cp.MeretId = m.MeretId
    inner join cipo c on cp.Id = c.Id;

#CipoMeretById
  select m.Meret from meretek m
    inner join cipomeretek cp on cp.MeretId = m.MeretId
  where cp.Id = 1;

#CipoMeretDelete
delete from cipomeretek
where Id = 1 and MeretId = 4;
#CipoMeretUpdate
 Update cipomeretek
  set MeretId= 4
  WHERE Id = 1;

#CipoMeretInsert
INSERT into cipomeretek
  (Id,MeretId) VALUE (1,4);

#MeretAbc
select MeretId,Meret from meretek
order by Meret;

#TipusAbc
select TipusId,Tipus from tipus
order by Tipus;

#SzinAbc
select SzinId,Szin from szinek
order by Szin;

#MarkaAbc
select MarkaId,Marka from marka
order by Marka;

#TipusTablaById
select * from tipus
where TipusId = 1;
;
#MeretTablaById
select * from meretek
where MeretId = 1
;
#SzinekTablaById
select * from szinek
  where SzinId = 1;
#MarkaTablaById
select * from marka
where MarkaId = 1;



#CipoTablaById
select c.Id,c.Nev,t.TipusId,t.Tipus,sz.SzinId,sz.Szin,ma.MarkaId,ma.Marka,c.Leiras,c.Netto,c.AfaKulcs,c.Kep from cipo c
    inner join tipus t on c.TipusId = t.TipusId
    inner join szinek sz on sz.SzinId = c.SzinId
  inner join marka ma on ma.MarkaId = c.MarkaId
  where c.Id = 1
  ;

#-------
#Statisztik�k ?



#Rakt�rK�szlet ?
#TipusKeszlet
select t.Tipus,COUNT(c.TipusId) from cipo c
inner join tipus t on t.TipusId = c.TipusId
GROUP by t.TipusId
;

#MeretKeszlet
select m.Meret,COUNT(c.MeretId) from cipo c
inner join meretek m on m.MeretId = c.MeretId
GROUP by m.MeretId
;

#SzinKeszlet
select sz.Szin,COUNT(c.SzinId) from cipo c
inner join szinek sz on sz.SzinId = c.SzinId
GROUP by sz.SzinId
;

#MarkaKeszlet
select m.Marka,COUNT(c.MarkaId) from cipo c
inner join marka m on m.MarkaId = c.MarkaId
GROUP by m.MarkaId
;


#----------------
#T�rl�sek
#CipoDeleteById
delete from cipo
where Id = 1;

#MeretDeleteById
delete from meretek
where MeretId = 1;

#MarkaDeleteById
delete from marka
where MarkaId = 1;

#TipusDeleteById
delete from tipus
where TipusId = 1;

#SzinekDeleteById
delete from szinek
where SzinId = 1;


#-------
#Hozz�f�z�s
#CipoInsert
INSERT into cipo
    (Nev,TipusId,SzinId,MarkaId,Leiras,Netto,AfaKulcs,Kep)
    VALUES
    ('Newfeel',1,1,1,'Le�r�s',3000,0.27,'kep.png');

#MeretInsert
INSERT into meretek
  (Meret) VALUE (45);

#TipusInsert
INSERT into tipus
  (Tipus) VALUE ('Vizicipo');

#MarkaInsert
INSERT into marka
  (Marka) VALUE ('Nike');

#SzinInsert
INSERT into szinek
  (Szin) VALUE ('S�t�tk�k');

#------
#Mod�s�t�s
#CipoUpdateById
UPDATE cipo
    SET Nev='Newfeel', TipusId=1, SzinId=1, MarkaId=1,Leiras='Le�r�s',Netto=3000,AfaKulcs=0.27,Kep='kep.png'
  where Id = 1
  ;
#SzinUpdateById
Update szinek
  set Szin='barna'
  WHERE SzinId = 1;

#MarkaUpdateById
Update marka
  set Marka='Adidas'
  WHERE MarkaId = 1;

#TipusUpdateById
  Update tipus
    set tipus='cip�'
    WHERE TipusId = 1








#------
#Kis�rlet

#Ciposzinei
  select c.Nev"Cipo neve",sz.Szin"Szine" from cipo c
    inner join szinek sz on sz.SzinId = c.SzinId;

#CipoMeretei
  select c.Nev"Cipo neve",sz.Szin"Szine",m.Meret"M�ret" from cipo c
    inner join szinek sz on sz.SzinId = c.SzinId
  inner join meretek m on m.MeretId = c.MeretId;

#tipus m�rka m�ret �s szin
  select c.Nev,t.Tipus,ma.Marka,m.Meret,sz.Szin from cipo c
    inner join tipus t on c.TipusId = t.TipusId
    inner join szinek sz on sz.SzinId = c.SzinId
  inner join meretek m on m.MeretId = c.MeretId
  inner join marka ma on ma.MarkaId = c.MarkaId
  ;

#Csak fekete cip�
  select c.Nev,t.Tipus,ma.Marka,m.Meret,sz.Szin,c.Leiras from cipo c
     inner join tipus t on c.TipusId = t.TipusId
    inner join szinek sz on sz.SzinId = c.SzinId
  inner join meretek m on m.MeretId = c.MeretId
  inner join marka ma on ma.MarkaId = c.MarkaId
    WHERE sz.Szin = "Fekete";

#Meretabc
select Meret from meretek
order by Meret;
#TipusAbc
select Tipus"Tipus n�v" from tipus
order by Tipus;
  
#Szin
select Szin"sz�n n�vek" from szinek
order by Szin;

#K�pek
  select Id,Nev,Kep from cipo;





  