import java.util.ArrayList;

public class Main{
    public static void main(String[] args){
        Printer<Integer> printer = new Printer<>(23);
        printer.print();

        Printer<Double> printerDouble = new Printer<>(5.3);
        printerDouble.print();


        ArrayList<Cat> cats = new ArrayList<>();
        cats.add(new Cat());
        Cat myCat = (Cat)cats.get(0);    
    }

}