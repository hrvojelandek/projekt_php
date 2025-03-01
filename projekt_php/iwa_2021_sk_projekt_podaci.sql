SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
USE `iwa_2021_sk_projekt` ;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


INSERT INTO ` ` (`tip_korisnika_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'moderator'),
(2, 'korisnik');

INSERT INTO `znanstveno_podrucje` (`znanstveno_podrucje_id`, `naziv`, `opis`) VALUES
(1,'Informacijske i komunikacijske znanosti','Informacijske i komunikacijske znanosti'),
(2,'Brodogradnja','Brodogradnja'),
(3,'Veterinarska medicina','Veterinarska medicina'),
(4,'Ekonomija','Ekonomija'),
(5,'Kazališna umjetnost','Kazališna umjetnost');

INSERT INTO `korisnik` (`korisnik_id`, `tip_korisnika_id`, `znanstveno_podrucje_id`,`korime`, `lozinka`, `ime`, `prezime`, `email`, `slika`, `titula`,`radno_mjesto`,`opis`) VALUES
(1,  0, null, 'admin', 'foi', 'Administrator', 'Admin', 'admin@foi.hr', 'korisnici/admin.jpg','','',''),
(2,  1, 1, 'voditelj', '123456', 'voditelj', 'Vodi', 'voditelj@foi.hr', 'korisnici/admin.jpg','dr. sc.','Asistent','Asistent na FOI-u'),
(3,  2, null, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 'korisnici/pkos.jpg','','',''),
(4,  1, 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 'korisnici/vzec.jpg','prof. dr. sc.','Redoviti profesor',''),
(5,  2, null, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 'korisnici/qtarantino.jpg','','',''),
(6,  2, null, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 'korisnici/mbellucci.jpg','','',''),
(7,  2, null, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 'korisnici/vmortensen.jpg','','',''),
(8,  2, null, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 'korisnici/jgarner.jpg','','',''),
(9,  2, null, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 'korisnici/nportman.jpg','','',''),
(10, 2, null, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr', 'korisnici/dradcliffe.jpg','','',''),
(11, 2, null, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 'korisnici/hberry.jpg','','',''),
(12, 2, null, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 'korisnici/vdiesel.jpg','','',''),
(13, 2, null, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 'korisnici/ecuthbert.jpg','','',''),
(14, 1, 3, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 'korisnici/janiston.jpg','dr. sc.','Asistent','Asistent na medicini'),
(15, 2, null, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 'korisnici/ctheron.jpg','','',''),
(16, 1, 4, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 'korisnici/nkidman.jpg','prof. dr. sc.','Izvanredna profesorica','Izvanredna profesorica od 2013'),
(17, 1, 5, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 'korisnici/ewatson.jpg','dr. sc.','Umjetnica','Umjetnica'),
(18, 2, null, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 'korisnici/kdunst.jpg','','',''),
(19, 2, null, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 'korisnici/sjohansson.jpg','','',''),
(20, 2, null, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 'korisnici/philton.jpg','','',''),
(21, 2, null, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 'korisnici/kbeckinsale.jpg','','',''),
(22, 2, null, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 'korisnici/tcruise.jpg','','',''),
(23, 2, null, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 'korisnici/hduff.jpg','','',''),
(24, 2, null, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 'korisnici/ajolie.jpg','','',''),
(25, 2, null, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 'korisnici/kknightley.jpg','','',''),
(26, 2, null, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 'korisnici/obloom.jpg','','',''),
(27, 2, null, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 'korisnici/llohan.jpg','','',''),
(28, 2, null, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 'korisnici/jdepp.jpg','','',''),
(29, 2, null, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 'korisnici/kreeves.jpg','','',''),
(30, 2, null, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 'korisnici/thanks.jpg','','',''),
(31, 2, null, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 'korisnici/elongoria.jpg','','',''),
(32, 2, null, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 'korisnici/rde.jpg','','',''),
(33, 2, null, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 'korisnici/jheder.jpg','','',''),
(34, 2, null, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 'korisnici/rmcadams.jpg','','',''),
(35, 2, null, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 'korisnici/cbale.jpg','','',''),
(36, 2, null, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 'korisnici/jalba.jpg','','',''),
(37, 2, null, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 'korisnici/bpitt.jpg','','',''),
(43, 2, null, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 'korisnici/apacino.jpg','','',''),
(44, 2, null, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 'korisnici/wsmith.jpg','','',''),
(45, 2, null, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 'korisnici/ncage.jpg','','',''),
(46, 2, null, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 'korisnici/vanne.jpg','','',''),
(47, 2, null, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 'korisnici/kheigl.jpg','','',''),
(48, 2, null, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 'korisnici/gbutler.jpg','','',''),
(49, 2, null, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 'korisnici/jbiel.jpg','','',''),
(50, 2, null, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 'korisnici/ldicaprio.jpg','','',''),
(51, 2, null, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 'korisnici/mdamon.jpg','','',''),
(52, 2, null, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 'korisnici/hpanettiere.jpg','','',''),
(53, 2, null, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 'korisnici/rreynolds.jpg','','',''),
(54, 2, null, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 'korisnici/jstatham.jpg','','',''),
(55, 2, null, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 'korisnici/enorton.jpg','','',''),
(56, 2, null, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 'korisnici/mwahlberg.jpg','','',''),
(57, 2, null, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 'korisnici/jmcavoy.jpg','','',''),
(58, 2, null, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 'korisnici/epage.jpg','','',''),
(59, 2, null, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 'korisnici/mcyrus.jpg','','',''),
(60, 2, null, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 'korisnici/kstewart.jpg','','',''),
(61, 2, null, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 'korisnici/mfox.jpg','','',''),
(62, 2, null, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 'korisnici/slabeouf.jpg','','',''),
(63, 2, null, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 'korisnici/ceastwood.jpg','','',''),
(64, 2, null, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 'korisnici/srogen.jpg','','',''),
(65, 2, null, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr', 'korisnici/nreed.jpg','','',''),
(66, 2, null, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr', 'korisnici/agreene.jpg','','',''),
(67, 2, null, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr', 'korisnici/zdeschanel.jpg','','',''),
(68, 2, null, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr', 'korisnici/dfanning.jpg','','',''),
(69, 2, null, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr', 'korisnici/tlautner.jpg','','',''),
(70, 2, null, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr', 'korisnici/rpattinson.jpg','','','');




INSERT INTO `zahtjev_podrucja` (`moderator_id`, `znanstveno_podrucje_id`, `status`) VALUES
(2,2,0),
(2,3,0),
(2,1,1),
(4,2,1),
(14,3,1),
(16,4,1),
(17,2,0),
(17,5,1),
(18,2,2),
(17,4,2);

INSERT INTO `komentar` (`komentar_id`, `znanstveno_podrucje_id`,`korisnik_id`,`sadrzaj`,`datum_vrijeme_kreiranja`,`komentar_znanstvenika`) VALUES
(1, 1, 1, 'Što je sve potrebno znati da upišem doktorat iz Informacijskih i komunikacijskih znanosti?', '2021-10-22 15:29:00', 0),
(2, 1, 70, 'Pa pogledaj na stranici  fakulteta.', '2021-10-22 16:29:00', 0),
(3, 1, 1, 'Kojeg fakulteta?', '2021-10-23 15:29:00', 0),
(4, 1, 2, 'Sve informacije nalaze se na stranicama fakulteta organizacije i informatike foi.unizg.hr', '2021-10-23 16:29:00', 1),
(5, 1, 2, 'Također možete ako ste u varaždinu možete otići u referadu za poslijediplomski studij.', '2021-10-25 15:29:00', 1),
(6, 1, 3, 'Da li spada u ovo područje i programiranje?', '2021-10-24 15:29:00', 0),
(7, 1, 4, 'Ne mogu učitati stranicu kada kliknem na nju preko react JS-a. Možete li mi pomoći?', '2021-10-27 15:29:00', 0),
(8, 2, 3, 'Jel već moram imati brod da se bavim ovim područjem?', '2021-10-22 15:29:00', 0),
(9, 2, 4, 'Ne morate ima puno segmenata kojima se možete baviti a da ne morate imati vlastiti brod.', '2021-10-23 15:29:00', 1),
(10, 5, 3, 'Što znači kazališna umjestnost?', '2021-10-22 15:29:00', 0),
(11, 5, 3, 'Jel treba znati plesati ako želim se baviti kazalištem?', '2021-10-23 15:29:00', 0),
(12, 5, 17, 'Kazališna umjetnost u suvremenom svijetu jedna je od najčešćih grana kulture. Širom svijeta izgrađena je velika raznolikost zgrada kazališta u kojima se svakodnevno izvode predstave. Razvojem inovativnih tehnologija mnogi su ljudi počeli zaboravljati prave vrijednosti umjetnosti. ', '2021-10-24 15:29:00', 1),
(13, 5, 3, 'Nisam zadovoljan odgovorom i dalje ne kužim što je kazališna umjestnost?', '2021-10-25 15:29:00', 0),
(14, 3, 1, 'Imam psa oko mu suzi da li je to problem?', '2021-10-22 15:29:00', 0),
(15, 3, 14, 'Da može biti najbolje da pitate svog veterinara.', '2021-10-23 15:29:00', 0);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
