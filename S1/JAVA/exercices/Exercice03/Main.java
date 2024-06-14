public class Main {
    public static void main(String[] args) {
        Noeud arbre = new Noeud(18);
        arbre.ajoute(7);
        arbre.ajoute(13);
        arbre.ajoute(-1);
        arbre.ajoute(21);
        arbre.ajoute(12);
        arbre.ajoute(69);
        arbre.ajoute(33);

        System.err.println(arbre);
    }
}
