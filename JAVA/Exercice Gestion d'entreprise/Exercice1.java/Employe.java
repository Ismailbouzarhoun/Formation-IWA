public class Employe {
    protected String nom;
    protected String dateEmbauche;
    protected double salaire=7000;

    Employe(){
    }
    Employe(String nom,String dateEmbauche){
        this.nom=nom;
        this.dateEmbauche=dateEmbauche;
    }
    Employe(String nom,String dateEmbauche, double salaire){
        this.nom=nom;
        this.dateEmbauche=dateEmbauche;
        this.salaire=salaire;
    }
    public int anciennete(String dateCourante){
        String[] current = dateCourante.split("/");
        int currentYear = Integer.parseInt(current[0]);
        int currentMonth = Integer.parseInt(current[1]);

        String[] embauche = dateCourante.split("/");
        int embaucheYear = Integer.parseInt(embauche[0]);
        int embaucheMonth = Integer.parseInt(embauche[1]);

        return (currentYear-embaucheYear)*12+(currentMonth-embaucheMonth);
    }

    public double augSalaire(String dateCourante){
        String[] current = dateCourante.split("/");
        int currentYear = Integer.parseInt(current[0]);
        int currentMonth = Integer.parseInt(current[1]);

        String[] embauche = dateEmbauche.split("/");
        int embaucheYear = Integer.parseInt(embauche[0]);
        int embaucheMonth = Integer.parseInt(embauche[1]);
        return salaire=((currentYear-embaucheYear)*12+(currentMonth-embaucheMonth))*10+salaire;
    }

    public String toString(){
        return "Nom : " + nom + ", Date d'ambauche : " + dateEmbauche + ", Salaire : " + salaire;
    }

}
