public class Test {
    public static void main(String[] args){
        Employe employe1 = new Employe("Adam", "2021/05/13");
        Employe employe2 = new Employe("reda","2023/08/15");
        Manager manager1 = new Manager("Ismail", "2023/08/15","2023/08/15");
        System.out.println(employe1.toString());
        employe1.augSalaire("2023/10/02");
        System.out.println(employe1.toString());
        System.out.println(manager1.toString());
        manager1.augSalaire("2023/10/02");
        System.out.println(manager1.toString());
    }
}