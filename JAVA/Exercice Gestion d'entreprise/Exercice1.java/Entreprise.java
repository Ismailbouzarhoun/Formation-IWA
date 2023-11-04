
public class Entreprise {
    private Employe[] entreprise;
    private int capacite =10;
    private int nbEmp;

    Entreprise(){

    }

    public void ajouterEmp(Employe e){
        if(nbEmp==capacite){
            System.out.println("L'entrepprise est plein.");
        }else{
            entreprise[++nbEmp]=e;
                System.out.println("L'employe a ete ajoute.");
        }
    }
    public void redimensionner(){
        capacite*=2;
        System.out.println("La capacite d'entreprise maintenant est : "+capacite);
    }

    public void supprimerEmp(Employe e){
        entreprise[nbEmp--]=null;
    }

    public boolean estVide(){
        if(nbEmp>=capacite){
            return false;
        }else{
            return true;
        }
    }

    public void augmenterSalaires(String dateCourante){
        for(int i=0;i<nbEmp;i++){
            entreprise[i].augSalaire(dateCourante);
        }
    }

    public String toString(){
        StringBuffer st = new StringBuffer();
        for(int i=0;i<nbEmp;i++){
            st.append(entreprise[i].toString()).append("\n");
        }
        return st.toString();
    }
}
