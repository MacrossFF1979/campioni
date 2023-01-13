

	TESI DI FINE CORSO	
		
		
	DAVIDE NUTI	
	31/1/2023
—
CORSO IFTS – SCREEN Software Creator Environment

	
		


Problema:

Durante lo svolgimento del corso, ho lavorato part-time in una ditta di analisi chimico/fisiche su campioni di pelle a S.Croce sull’Arno (Pi). Durante questo periodo di tempo, una delle mie mansioni era quella di tranciare la pelle in un formato adeguato per le analisi e di inserire i campioni di pelle tranciata nei vari macchinari. Poiché i vari tipi di software e la procedura aziendale richiedevano l’inserimento dei nomi dei campioni a mano in maniera ripetitiva (ad esempio un tipo di analisi richiede sei campioni della solita pelle), i tempi si allungavano notevolmente e c’era la possibilità di errori nell’inserimento dei campioni. 
Da qui la necessità di creare un applicativo che facilitasse e velocizzasse l’inserimento dei dati.


Obiettivo: 

Creare un applicativo che consentisse all’utente di avere i numeri di analisi di un determinato campione di pelle ordinati in ordine crescente, con il corrispettivo tipo di analisi e con l’adeguato nome del file per inserire nel salvataggio. Il programma deve girare su PC con sistema operativo Windows.


Come funziona: 

 
	
Il programma viene laciato normalmente con un doppio clic. Si apre una finestra in cui si possono inserire fino a venti campioni. Il massimo di venti campioni è stato inserito come un adeguato limite massimo delle analisi da effettuare in una volta. Un singolo campione è formato da un numero intero di quattro cifre. Inserendo 0 si termina l’inserimento dei dati. 


 

Sia per l’inserimento dei campioni che per il tipo delle analisi da effettuare è previsto un controllo dell’input: non si possono inserire numeri più lunghi o più corti di quattro cifre e non si possono inserire lettere. La scelta è stata effettuata per evitare il più possibile errori nella fase di inserimento.

 

Una volta terminata la registrazione dei campioni va scelto il metodo di analisi. Una volta scelto il programma si chiude e nella cartella viene salvato il file campioni.txt, facilmente apribile con un editor di testo. 
Il file viene sovrascritto ogni volta che si lancia il programma e si inseriscono i dati, in quanto una volta effettuato il salvataggio sul gestionale non occorre più mantenere i dati dei campioni sul file di testo.

 

Il file di testo è composto da due parti: 

-	La prima presenta tutti i numeri di campioni ordinati in maniera crescente, seguiti dal tipo di analisi da effettuare.
-	La seconda parte invece è rappresentata dal nome del file da salvare. 
Il formato è una serie di: AN0 + numero del campione -22 (anno corrente), che si ripetono per il numero di campioni inseriti.Alla fine viene aggiunto il tipo di analisi.



CODICE SORGENTE:


https://github.com/MacrossFF1979/campioni.git
