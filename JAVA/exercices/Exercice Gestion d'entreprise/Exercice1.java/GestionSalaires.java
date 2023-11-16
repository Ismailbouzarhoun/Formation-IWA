import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;

public class GestionSalaires {
    Entreprise[] salarie;
    public static Entreprise lireDonnes(String nomFichier){
        try {
            BufferedReader file = new BufferedReader(new FileReader(nomFichier));
            String line;
            while((line = file.readLine())!=null){
                String[] data = line.split(";");
                String nom = data[0].trim();
                String dateEmbauche = data[1].trim();
                double salaire = Double.parseDouble(data[2].trim());
                

            }
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }
        return null;
    }
}
