
public class Manager extends Employe {
    protected String dateFontion;
    protected double salaire=10000;
    Manager(String nom, String dateEmbauche, String dateFontion) {
        super(nom, dateEmbauche);
        this.dateFontion=dateFontion;
    }

    public int anciennete(String dateCourante){
        String[] current = dateFontion.split("/");
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

        String[] embauche = dateFontion.split("/");
        int FontionYear = Integer.parseInt(embauche[0]);
        int FontionMonth = Integer.parseInt(embauche[1]);
        return salaire = ((currentYear-FontionYear)*12+(currentMonth-FontionMonth))*10+salaire;
    } 
    public String toString(){
        return super.toString() + "date de fontion en tant que manager : " +dateFontion;
    }
}
