public class Noeud{
    public Noeud filsDroit;
    public Noeud filsGauche;
    public int valeur;

    Noeud(int valeur){
        this.valeur = valeur;
        this.filsDroit=null;
        this.filsGauche=null;
    }

    public void ajoute(int v){
        if (v<valeur){
            ajouteGauche(v);
        }else{
            ajouteDroit(v);
        }
    }
    public void ajouteGauche(int v){
        if(filsGauche==null){
                filsGauche = new Noeud(7);
        }else{
            filsGauche.ajoute(v);
        }
    }
    public void ajouteDroit(int v){
        if(filsDroit==null){
                filsDroit = new Noeud(7);
        }else{
            filsDroit.ajoute(v);
        }
    }
}