
public class Processing{

   ArrayListe <Occurence> L;

   public Processing(){
    L = new  ArrayListe <Occurence>();
   } 
  public  void processFile( String FileName, String type){

      // lecture de fichier : Ajouter les instructions nécessaires
       
      while (st.hasNextLine()){

      processLine(st.nextLine(), type);

      }

  }
public  void processLine( String Line, String type){

	if (type.equals("C")){

		for(int i=0; i<=Line.size()-1; i++ ){
		   processWord(Line.subString(i, i+1));
		}

	}else{

       Line = Line.remplaceAll(".","");
       Line = Line.remplaceAll(",","");
       Line = Line.remplaceAll(";","");
       Scanner t = new Scanner(Line).useDelimiter(" ");
       while(t.hasNext()){

       processWord(t.next());

       }

	}

public  int ispresent(W){
	int i=-1;
	boolean b =false;
	for (Occurent o : L){
		i++;
       if(o.getWord().equals(W)) {
       	b= true;
       	break;
       }
       	
     }
 	 if (b==false) i=-1;

 	 return i;
	}


}
	
  public  void processWord(String W){
  	int index = ispresent(W);
     
    if (index == -1){  // l'élémént rechecherché n'est pas dans la liste
     
    	L.add(new Occurence(W,1));
    } else{

    	L.get(index).increment();

    }

    public void printOccrences(){
    	for (Occurent o : L){
    	String suff =".";
    	if(o.getOccur()>1) suff="s.";
		  System.out.println (o.getWord()+" has appeared "+o.getOccur()+"time"+suff);
       }
       	
 public String toString(){
 	    String =S;
    	for (Occurent o : L){
    	String suff =".";
    	if(o.getOccur()>1) suff="s.";
		  S+="o.getWord()+" has appeared "+o.getOccur()+"time"+suff \n";
       }

       return S;
    }
  }


}






  }
