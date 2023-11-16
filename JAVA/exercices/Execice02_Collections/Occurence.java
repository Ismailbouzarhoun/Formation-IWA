public class Occurence{
    
    private String Word;
    private int occur;

    Occurence(String W, int o){

    	Word=W;
    	occur = o;
    }	
    increment(){

    	occur++;
    }
    public int  getOccur(){
    	return occur;
    	}
    public String getWord(){

    	return Word;
    }

}