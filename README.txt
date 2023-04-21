Folder imena Project_Mate_Renic sadrži projekt koji je potrebno staviti u htdocs XAMPP-a.

Za pokretanje projekta i sve funkcionalnosti potrebno je uključiti Apache i MySQL module.

Ako MySQL modul ne radi, pokušajte ovo:
	1. Odite u Task Manager (Shortcut: CTRL + SHIFT + ESC)
	2. Kliknite na odjeljak Services
	3. Pronađite MySQL80 servis
	4. Kliknite desnu tipku miša na taj servis
	5. Odaberite Stop opciju iz padajućeg izbornika
	6. Ponovno pokrenite MySQL modul iz XAMPP Control Panele

U projektu su primarno korišteni HTML, CSS i PHP sa malo Javascripta za validaciju članaka.

Za pristup admin stranici koristiti:
	Username: admin
	Password: QsEfG1234

-------------------------------------------------------------------------------------------------------
This project requires the use of XAMPP or another similar tool as it needs an Apache and MySQL servers.

In case MySQL is giving you troubles, take a look into Task Manager -> Details
Look for anything that has "mysql" in it's name, right click it and press "End Process" or change the port, that works too, but requires tweaks inside the code.

All of this needs to be placed inside XAMPPs htdocs folder to work.

Admin login:
Username: admin
Password: QsEfG1234
