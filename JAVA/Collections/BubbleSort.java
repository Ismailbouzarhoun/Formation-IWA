public class BubbleSort {
    public static void main(String[] args) {
        int nums[] = {6,5,2,8,9,4};

        System.err.println("before sorting ");
        for (int num : nums){
            System.err.print(num+" ");
        }
        int temp;
        for(int i=0;i<nums.length;i++){
            for(int j=0;j<nums.length-i-1;j++){
                if(nums[j]>nums[j+1]){
                    temp=nums[j];
                    nums[j]=nums[j+1];
                    nums[j+1]=temp;
                }
            }
            System.err.println();
            for (int num : nums){
                System.err.print(num+" ");
        }
        }


        System.err.println();
        System.err.println("after sorting ");
        for (int num : nums){
            System.err.print(num+" ");
        }
    }
}
