import java.util.Scanner;

public  class Premier{
    public static void main(String[] args){
        Scanner scan = new Scanner(System.in);
        System.out.println("Enrer un nombre :");
        int number = scan.nextInt();
        int a=0;
        for(int i=1;i<=number/2;i++){
            if(number%i == 0){
                a++;
                if(a>=2){
                    break;
                }
            }
        }
        if(a>=2){
            System.out.println("Le nombre n'a pas premier");
        }
        else if(a<2){
            System.out.println("Le nombre est premier");
        }
    }
}
