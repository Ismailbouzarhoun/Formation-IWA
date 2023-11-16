


public class Main (){
	

  public static void main (String [] Args){

 	Processing pf = new Pressing();
 	pf.processFile(Args[0], Args[1]); // Args[0] est le nom de fichier et Args[1], c'est
 	le type de traitement W pour un mot et C pour un charactère 
 	pf.printOccrences();


  } 


}