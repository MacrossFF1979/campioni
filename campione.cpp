#include <iostream>
#include <fstream>
#include <sys/time.h>
#include <ctime>
#define MaxCampioni 20 (Il programma è fatto per accettare un massimo di venti campioni. Il numero si è dimostrato più che sufficiente)
using namespace std;

string CampioneDaInserire;
int CampioneInserito;
int i=0;
int posizione=0;
int ArrayCampioni[MaxCampioni];
string scelta_analisi, anno;
int check_analisi=0;

//*****************PROTOTIPI***************************************//
bool isNumber(const string& str);
int EXITVALUE (string valoreingresso1);
void selection_sort(int arr[], int lunghezza);
void istruzioni();
string tipoanalisi (int i);
string annofinale();
//*****************************************************************//

int main ()
{
/* Istruzioni */
istruzioni();

/*Inserimento del campione*/
int maxsamplecheck=0;
do
{
CampioneInserito=EXITVALUE(CampioneDaInserire);
if (CampioneInserito>0 && i<MaxCampioni)
    {
    ArrayCampioni[posizione]=CampioneInserito;
    posizione++;
    }
else
    {
    cout<<"-- Fine registrazione --";
    }
}
while (CampioneInserito!=0);

/*Ordinamento dei valori inseriti nell'array*/
selection_sort(ArrayCampioni,MaxCampioni);

scelta_analisi = tipoanalisi(check_analisi);
anno = annofinale();

/*Stampa nel file*/
ofstream myfile;
myfile.open ("campioni.txt");
if (scelta_analisi=="ADESIONE")
{
    for (int i=0;i<posizione;i++)
    {
    myfile<<ArrayCampioni[i]<<"P"<<endl;
    myfile<<ArrayCampioni[i]<<"P"<<endl;
    myfile<<ArrayCampioni[i]<<"P"<<endl;
    myfile<<ArrayCampioni[i]<<"P"<<endl;
    myfile<<ArrayCampioni[i]<<"PE"<<endl;
    myfile<<ArrayCampioni[i]<<"PE"<<endl;
    myfile<<ArrayCampioni[i]<<"PE"<<endl;
    myfile<<ArrayCampioni[i]<<"PE"<<endl;
    }
}
else
{
    for (int i=0;i<posizione;i++)
    {
    myfile<<ArrayCampioni[i]<<" par 1"<<endl;
    myfile<<ArrayCampioni[i]<<" par 2"<<endl;
    myfile<<ArrayCampioni[i]<<" par 3"<<endl;
    myfile<<ArrayCampioni[i]<<" perp 1"<<endl;
    myfile<<ArrayCampioni[i]<<" perp 2"<<endl;
    myfile<<ArrayCampioni[i]<<" perp 3"<<endl;
    }
}
    myfile<<endl;
for (int i=0;i<posizione;i++)
    {
    myfile<<"AN0"<<ArrayCampioni[i]<<"-"<<anno<<" ";
    }
myfile<<scelta_analisi;
myfile.close();
return 0;
}



/*Funzione che controlla se ci sono esclusivamente cifre nell'input*/
bool isNumber(const string& str)
{
    return str.find_first_not_of("0123456789") == string::npos; find_first_not_of ricerca il primo carattere diverso da quelli passati in argomento
								npos in questo caso si usa per indicare che non ci sono riscontri
}

/*funzione che controlla se il valore è corretto*/

int EXITVALUE (string valoreingresso1)
{
    int valoreuscita1=0;
    int flag=0;
    int checklength=0;
    while (flag==0)
    {
    cout<<"Inserisci il Campione numero "<<(posizione+1)<<" :";
    cin>>(valoreingresso1);
    checklength=valoreingresso1.length();		Serie di controlli sull’input
        if (valoreingresso1=="0")
        {
        flag++;
        }
        else if (checklength!=4)
        {
        cout<<"ERRORE: il codice del campione deve essere esattamente di 4 cifre."<<endl;
        }
        else if (isNumber(valoreingresso1)==false)
        {
        cout<<"ERRORE: il codice contiene caratteri non validi (lettere o simboli)"<<endl;
        }
        else if (posizione>MaxCampioni-1)
        {
        cout<<"ATTENZIONE: E' stato inserito il massimo numero di dati possibile"<<endl;
        flag++;
        }
        else
        {
        valoreuscita1 = stoi(valoreingresso1);
        flag++;
        }
    }
    return valoreuscita1;
}



/*FUNZIONE Ordinamento array*/

void selection_sort(int arr[], int lunghezza) {
    int i,j;
    int n=0;
    int numero_minore;

    for (i = 0; i < lunghezza-1; i++)
    {
        numero_minore = i;

        for (j = i + 1; j < lunghezza; j++){

            if (arr[j] < arr[numero_minore]) {
                numero_minore = j;
            }

		}

        int tmp = arr[i];
        arr[i] = arr[numero_minore];
        arr[numero_minore] = tmp;
    }
    //Scorre l'array e appena trova un numero maggiore di zero lo porta in cima.
    for (int k=0;k<MaxCampioni;k++)
    {
        if((arr[k])!=0)
        {
            arr[(0+n)]=arr[k];
            n++;
        }
    }
}

void istruzioni()
{
cout<<"**************************************";
cout<<" Programma creazione nomi delle prove ";
cout<<"**************************************";
cout<<endl<<endl;
cout<<"Autore: Davide Nuti. Ver. 1.3";
cout<<endl<<endl<<endl;
cout<<"Il file campioni.txt viene salvato nella solita directory del programma"<<endl;
cout<<"Nel file si trovano i nomi delle prove pronti per il copia/incolla"<<endl;
cout<<"Inserendo 0 si termina l'inserimento dei nomi"<<endl<<endl;
cout<<"Dopo l'inserimento dei nomi e' necessario scegliere il tipo di analisi che verra' stampato alla fine del nome del file";
cout<<endl<<endl<<endl;
}

string tipoanalisi (int i)

{
string scelta;
do
    {
    cout<<endl<<endl;
    cout<<"Inserisci il tipo di analisi"<<endl;
    cout<<"****************************"<<endl;
    cout<<"1 - STRAPPO SINGOLO"<<endl;
    cout<<"2 - STRAPPO DOPPIO"<<endl;
    cout<<"3 - ADESIONE"<<endl;
    cout<<"4 - TRAZIONE"<<endl;
    cout<<"5 - LACERAZIONE"<<endl<<endl;
    cout<<"(scelte valide solo da 1 a 5):";
    cin>>i;
    }
while (i<0 || i>5);
    if (i==1)
    {
    scelta="STRAPPO SINGOLO";
    }
    else if (i==2)
    {
    scelta="STRAPPO DOPPIO";
    }
    else if (i==3)
    {
    scelta="ADESIONE";
    }
    else if (i==4)
    {
    scelta="TRAZIONE";
    }
    else if (i==5)
    {
    scelta="LACERAZIONE";
    }
return scelta;
}

string annofinale() //procedura che scrive in chiusura al singolo campione l'anno come doppia cifra, es: "2022" viene scritto "22"
{
    string anno1;
    char tt[100];
    time_t now = time(nullptr);
    auto tm_info = localtime(&now);
    strftime(tt, 100, "%y", tm_info);
    anno1=tt;
    return anno1;
}
